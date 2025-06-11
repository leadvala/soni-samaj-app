<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTab extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_section_id',
        'title',
        'content',
        'video_url',
        'points',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }
}

