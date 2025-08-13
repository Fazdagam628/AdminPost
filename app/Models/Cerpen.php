<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Cerpen extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'keterangan',
        'writer',
        'class',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($cerpen) {
            $cerpen->slug = Str::slug($cerpen->judul);
        });

        static::updating(function ($cerpen) {
            if ($cerpen->isDirty('judul')) {
                $cerpen->slug = Str::slug($cerpen->judul);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
