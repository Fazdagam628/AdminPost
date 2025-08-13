<?php

namespace App\Models;

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
}
