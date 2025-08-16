<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'image_cover',
        'category',
        'slug',
        'description',
        'author',
    ];

    protected $casts = [
        'category' => 'array',
        'image' => 'array'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($asset) {
            $asset->slug = Str::slug($asset->name);
        });

        static::updating(function ($asset) {
            if ($asset->isDirty('name')) {
                $asset->slug = Str::slug($asset->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
