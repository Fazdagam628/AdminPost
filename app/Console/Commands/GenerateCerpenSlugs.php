<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cerpen;
use Illuminate\Support\Str;

class GenerateCerpenSlugs extends Command
{
    protected $signature = 'cerpen:generate-slugs';
    protected $description = 'Generate slug for all cerpens if missing or empty';

    public function handle()
    {
        $cerpens = Cerpen::whereNull('slug')->orWhere('slug', '')->get();

        if ($cerpens->isEmpty()) {
            $this->info('✅ Semua cerpen sudah memiliki slug.');
            return;
        }

        foreach ($cerpens as $cerpen) {
            $slug = Str::slug($cerpen->judul);

            // Hindari duplikat slug antar cerpen
            $originalSlug = $slug;
            $counter = 1;
            while (Cerpen::where('slug', $slug)->where('id', '!=', $cerpen->id)->exists()) {
                $slug = "{$originalSlug}-{$counter}";
                $counter++;
            }

            $cerpen->slug = $slug;
            $cerpen->save();

            $this->line("✔️ Slug generated for cerpen '{$cerpen->judul}': {$cerpen->slug}");
        }

        $this->info('🎉 Slug generation for cerpen completed.');
    }
}