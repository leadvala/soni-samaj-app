<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadhaiEntry extends Model
{
    protected $fillable = [
        'name',
        'reason',
        'description',
        'photo_path',
        'date',
        'city',
    ];
}
