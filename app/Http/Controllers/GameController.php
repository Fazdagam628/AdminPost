<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;



class GameController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori unik dari seluruh game
        $games = Game::latest()->get();

        return view('game.index', compact('games'));
    }
    public function game(Request $request)
    {
        $selectedCategory = $request->input('kategori');

        // Ambil semua game
        $gamesQuery = Game::query();

        // Filter berdasarkan kategori jika ada
        if ($selectedCategory) {
            $gamesQuery->whereJsonContains('kategori', ['kategori' => $selectedCategory]);
        }

        $games = $gamesQuery->get();

        // Ambil semua kategori unik dari seluruh game
        $allCategories = Game::all()
            ->flatMap(function ($game) {
                $kategories = $game->kategori;
                return collect($kategories)->pluck('kategori');
            })
            ->unique()
            ->values();

        return view('game.game', compact('games', 'allCategories', 'selectedCategory'));
    }



    public function show(string $id): View
    {
        $game = Game::findOrFail($id);
        return view('game.detail', compact('game'));
    }
}