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

        $gamesQuery = Game::query();

        if ($selectedCategory) {
            $gamesQuery->whereJsonContains('kategori', ['kategori' => $selectedCategory]);
        }

        $games = $gamesQuery->latest()->paginate(12)->appends($request->query()); // <- Penting agar query kategori tetap ada

        $allCategories = Game::select('kategori')->get()
            ->flatMap(fn($game) => collect($game->kategori)->pluck('kategori'))
            ->unique()
            ->values();

        return view('game.game', compact('games', 'allCategories', 'selectedCategory'));
    }

    public function show(string $id): View
    {
        $game = Game::findOrFail($id);

        // Cek apakah game ini sudah pernah dilihat dalam sesi ini
        $viewKey = 'viewed_game_' . $id;

        if (!Session::has($viewKey)) {
            $game->increment('views');
            Session::put($viewKey, true);
        }
        return view('game.detail', compact('game'));
    }
}
