<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'gotra',
        'marital_status',
        'dob',
        'address',
        'permanent_address',
        'qualifications',
        'gender',
        'blood_group',
        'house_type',
        'job_or_business',
        'aadhar',
        'photo',
    ];

}
