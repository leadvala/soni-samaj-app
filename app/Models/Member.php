<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        
        'name', 'father_name', 'mother_name',
    'gotra', 'gotra_self', 'gotra_mother', 'gotra_nani', 'gotra_dadi',
    'marital_status', 'dob', 'address', 'permanent_address',
    'district', 'area',
    'photo', 'qualifications', 'gender', 'blood_group',
    'house_type', 'job_or_business', 'business_name', 'business_location',
    'job_type', 'designation', 'work_place',
    'mobile', 'whatsapp',
    'satimata_place', 'bheruji_place', 'kuldevi_place'
    ];

}
