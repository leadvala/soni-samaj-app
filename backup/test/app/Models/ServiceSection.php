<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = [
        'image',
        'title',
        'subtitle',
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'service_section_pages')
                    ->withTimestamps();
    }

}
