<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cerpen;
use Illuminate\Support\Str;

class CheckDuplicateCerpenSlugs extends Command
{
    protected $signature = 'cerpen:check-duplicate-slugs';
    protected $description = 'Check and fix duplicate slugs in the cerpens table';

    public function handle()
    {
        $this->info('🔍 Memeriksa dan memperbaiki slug duplikat pada tabel cerpens...');

        $slugCounts = [];
        $updated = 0;

        $cerpens = Cerpen::whereNotNull('slug')->orderBy('id')->get();

        foreach ($cerpens as $cerpen) {
            $originalSlug = Str::slug($cerpen->judul);
            $slug = $originalSlug;

            // Tangani duplikat slug lokal dalam loop
            $i = 1;
            while (isset($slugCounts[$slug]) || Cerpen::where('slug', $slug)->where('id', '!=', $cerpen->id)->exists()) {
                $slug = "{$originalSlug}-{$i}";
                $i++;
            }

            if ($cerpen->slug !== $slug) {
                $this->warn("🔧 Duplikat slug ditemukan: {$cerpen->slug} → diubah menjadi: {$slug}");
                $cerpen->slug = $slug;
                $cerpen->save();
                $updated++;
            }

            $slugCounts[$slug] = true;
        }

        if ($updated > 0) {
            $this->info("✅ Selesai. Total slug cerpen yang diperbaiki: {$updated}");
        } else {
            $this->info("✅ Tidak ditemukan slug duplikat.");
        }

        return 0;
    }
}