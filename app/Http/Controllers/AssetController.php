<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
        $search = $request->input('search');
        $sort = $request->input('sort');

        $assetsQuery = Asset::query();

        if ($search) {
            // Ubah input ke uppercase
            $search = strtoupper($search);

            // Case-insensitive search menggunakan UPPER() untuk semua kolom
            $assetsQuery->whereRaw('UPPER(name) LIKE ?', ["%$search%"])
                ->orWhereRaw('UPPER(author) LIKE ?', ["%$search%"]);
        }

        if ($selectedCategory) {
            $assetsQuery->whereJsonContains('category', $selectedCategory);
        }

        // Sorting
        switch ($sort) {
            case 'oldest':
                $assetsQuery->orderBy('created_at', 'asc');
                break;
            case 'az':
                $assetsQuery->orderBy('name', 'asc');
                break;
            case 'za':
                $assetsQuery->orderBy('name', 'desc');
                break;
            case 'most_viewed':
                $assetsQuery->orderBy('views', 'desc');
                break;
            case 'least_viewed':
                $assetsQuery->orderBy('views', 'asc');
                break;
            default: // newest
                $assetsQuery->orderBy('created_at', 'desc');
        }
        $assets = $assetsQuery->latest()->paginate(12)->appends($request->query());
        $allCategories = Asset::select('category')->get()
            ->flatMap(fn($asset) => collect($asset->category))
            ->unique()
            ->sort()
            ->values();
        return view('assets.index', compact('assets', 'allCategories', 'selectedCategory', 'sort'));
    }

    public function show(Asset $asset): View
    {
        $viewKey = 'viewed_assets_' . $asset->id;

        if (!Session::has($viewKey)) {
            $asset->increment('views');
            Session::put($viewKey, true);
        }
        return view('assets.detail', compact('asset'));
    }
}
