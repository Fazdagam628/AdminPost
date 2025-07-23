<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'creator',
        'keterangan',
        'image',
        'kategori',
        'img_ss',
        'link_download',
        'link_youtube'
    ];

    protected $casts = [
        'img_ss' => 'array',
        'kategori' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($game) {
            $game->slug = Str::slug($game->name);
        });

        static::updating(function ($game) {
            if ($game->isDirty('name')) {
                $game->slug = Str::slug($game->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
