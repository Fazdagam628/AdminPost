<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Str;

class CheckDuplicateGameSlugs extends Command
{
    protected $signature = 'games:check-duplicate-slugs';
    protected $description = 'Check and fix duplicate slugs in the games table';

    public function handle()
    {
        $this->info('🔍 Memeriksa dan memperbaiki duplikat slug pada tabel games...');

        $slugCounts = [];
        $updated = 0;

        $games = Game::whereNotNull('slug')->orderBy('id')->get();

        foreach ($games as $game) {
            $originalSlug = Str::slug($game->name);
            $slug = $originalSlug;

            // Periksa apakah slug sudah ada
            $i = 1;
            while (isset($slugCounts[$slug])) {
                $slug = "{$originalSlug}-{$i}";
                $i++;
            }

            // Jika slug berubah, update game
            if ($game->slug !== $slug) {
                $this->warn("🔧 Slug duplikat ditemukan: {$game->slug} → diubah menjadi: {$slug}");
                $game->slug = $slug;
                $game->save();
                $updated++;
            }

            $slugCounts[$slug] = true;
        }

        if ($updated > 0) {
            $this->info("✅ Selesai. Total slug yang diperbaiki: {$updated}");
        } else {
            $this->info("✅ Tidak ada slug yang perlu diperbaiki.");
        }

        return 0;
    }
}
