<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'is_active',
        'image',
        'datetime',
        'type',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->is_active = $blog->is_active ?? 1;
            $blog->datetime = now();

            $slug = \Str::slug($blog->title);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $blog->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    protected $casts = [
        'datetime' => 'datetime',
    ];
}
