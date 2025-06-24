<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SangathanMember extends Model
{
    protected $fillable = [
        'name',
        'role_title',
        'sector',
        'mobile',
        'photo_path',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
