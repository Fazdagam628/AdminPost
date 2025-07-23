<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Str;

class GenerateGameSlugs extends Command
{
    protected $signature = 'games:generate-slugs';
    protected $description = 'Generate slug for all games if missing or empty';

    public function handle()
    {
        $games = Game::whereNull('slug')->orWhere('slug', '')->get();

        if ($games->isEmpty()) {
            $this->info('✅ Semua game sudah memiliki slug.');
            return;
        }

        foreach ($games as $game) {
            $slug = Str::slug($game->name);

            // Hindari duplikasi slug
            $originalSlug = $slug;
            $counter = 1;
            while (Game::where('slug', $slug)->where('id', '!=', $game->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $game->slug = $slug;
            $game->save();

            $this->line("✔️ Slug generated for game '{$game->name}': {$game->slug}");
        }

        $this->info('🎉 Slug generation completed.');
    }
}
