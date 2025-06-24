<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class City extends Model
{
    //
    protected $fillable = ['name', 'district_id'];

    public function district(): BelongsTo {
        return $this->belongsTo(District::class);
    }

    public function sangathanMembers()
   {
      return $this->hasMany(SangathanMember::class);
   }

}
