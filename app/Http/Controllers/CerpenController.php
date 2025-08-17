<?php

namespace App\Http\Controllers;

use App\Models\Cerpen;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CerpenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $cerpensQuery = Cerpen::query();
        if ($search) {
            // Ubah input ke uppercase
            $search = strtoupper($search);

            // case-insensitive search menggunakan UPPER() untuk semua kolom
            $cerpensQuery->where(function ($q) use ($search) {
                $q->whereHas('user', function ($query) use ($search) {
                    $query->whereRaw('UPPER(name) LIKE ?', ["%$search%"]);
                })
                    ->orWhereRaw('UPPER(judul) LIKE ?', ["%$search%"]);
            });
        }

        // Sorting
        switch ($sort) {
            case 'oldest':
                $cerpensQuery->orderBy('created_at', 'asc');
                break;
            case 'az':
                $cerpensQuery->orderBy('judul', 'asc');
                break;
            case 'za':
                $cerpensQuery->orderBy('judul', 'desc');
                break;
            case 'most_viewed':
                $cerpensQuery->orderBy('views', 'desc');
                break;
            case 'least_viewed':
                $cerpensQuery->orderBy('views', 'asc');
                break;
            default: // newest
                $cerpensQuery->orderBy('created_at', 'desc');
        }
        // Ambil sekitar 10 data cerpen
        $cerpens = $cerpensQuery->latest()->paginate(5)->appends($request->query());

        return view('cerpen.index', compact('cerpens','sort'));
    }

    public function show(Cerpen $cerpen): View
    {
        $viewkey = 'viewed_cerpen_' . $cerpen->id;

        if (!Session::has($viewkey)) {
            $cerpen->increment('views');
            Session::put($viewkey, true);
        }

        return view('cerpen.detail', compact('cerpen'));
    }
}
