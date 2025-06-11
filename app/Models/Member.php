<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'father_name', 'mother_name', 'dob', 'gender', 'marital_status',
    'address', 'permanent_address', 'gotra_self', 'gotra_mother', 'gotra_nani', 'gotra_dadi',
    'qualifications', 'blood_group', 'mobile', 'whatsapp', 'photo',
    'job_or_business', 'job_type', 'designation', 'work_city',
    'satimata_place', 'bheruji_place', 'kuldevi_place'
    ];

}
