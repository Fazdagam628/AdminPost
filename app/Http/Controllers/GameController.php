<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        $games = Game::latest()->get();
        return view('game.index', compact('games'));
    }

    public function show(string $id): View
    {
        $game = Game::findOrFail($id);
        return view('game.detail', compact('game'));
    }
}