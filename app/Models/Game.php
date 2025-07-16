<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{

    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'creator',
        'keterangan',
        'image',
        'kategori',
        'img_ss',
        'link_download',
        'link_youtube'
    ];

    protected $casts = [
        'img_ss' => 'array'
    ];
}