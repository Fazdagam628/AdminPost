<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;

class GameFilter extends Component
{
    public $selectedCategory = '';

    public function render()
    {
        // Ambil semua kategori dari array objek
        $categories = Game::select('kategori')->get()
            ->flatMap(function ($game) {
                return collect($game->kategori)->pluck('kategori');
            })
            ->unique()
            ->sort()
            ->values();

        // Filtering langsung di sini
        $games = Game::when($this->selectedCategory, function ($query) {
            $query->where('kategori', 'LIKE', '%"kategori":"' . $this->selectedCategory . '"%');
        })
            ->latest()
            ->get();

        return view('livewire.game-filter', [
            'categories' => $categories,
            'games' => $games,
        ]);
    }
}
