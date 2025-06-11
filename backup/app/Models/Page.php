<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'content',
        'icon',
        'is_active',
    ];

}
