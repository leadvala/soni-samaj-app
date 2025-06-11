<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterSection extends Model
{
    protected $fillable = [
        'image',
        'icon',
        'charity_name',
        'description',
        'contact_text',
        'contact_link',
    ];
}
