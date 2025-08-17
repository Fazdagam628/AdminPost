<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;




class GameController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori unik dari seluruh game
        $games = Game::latest()->paginate(10);

        return view('game.index', compact('games'));
    }
    public function game(Request $request)
    {
        $selectedCategory = $request->input('kategori');
        $search = $request->input('search');
        $sort = $request->input('sort');

        $gamesQuery = Game::query();

        if ($search) {
            // Ubah input ke uppercase
            $search = strtoupper($search);

            // Case-insensitive search menggunakan UPPER() untuk semua kolom
            $gamesQuery->where(function ($q) use ($search) {
                $q->whereRaw('UPPER(name) LIKE ?', ["%$search%"])
                    ->orWhereRaw('UPPER(creator) LIKE ?', ["%$search%"])
                    ->orWhereRaw('JSON_SEARCH(UPPER(JSON_EXTRACT(kategori, "$[*].kategori")), "one", ?) IS NOT NULL', [$search]);
            });
        }

        if ($selectedCategory) {
            $gamesQuery->whereJsonContains('kategori', ['kategori' => $selectedCategory]);
        }

        // Sorting
        switch ($sort) {
            case 'oldest':
                $gamesQuery->orderBy('created_at', 'asc');
                break;
            case 'az':
                $gamesQuery->orderBy('name', 'asc');
                break;
            case 'za':
                $gamesQuery->orderBy('name', 'desc');
                break;
            case 'most_viewed':
                $gamesQuery->orderBy('views', 'desc');
                break;
            case 'least_viewed':
                $gamesQuery->orderBy('views', 'asc');
                break;
            default: // newest
                $gamesQuery->orderBy('created_at', 'desc');
        }

        $games = $gamesQuery->latest()->paginate(12)->appends($request->query());

        $allCategories = Game::select('kategori')->get()
            ->flatMap(fn($game) => collect($game->kategori)->pluck('kategori'))
            ->unique()
            ->sort()
            ->values();

        return view('game.game', compact('games', 'allCategories', 'selectedCategory', 'sort'));
    }


    public function show(Game $game): View
    {
        $viewKey = 'viewed_game_' . $game->id;

        if (!Session::has($viewKey)) {
            $game->increment('views');
            Session::put($viewKey, true);
        }

        return view('game.detail', compact('game'));
    }
}
