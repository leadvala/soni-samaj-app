<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_slider_section',
        'is_register_section',
        'is_about_section',
        'is_service_section',
        'donation_title',
        'donation_subtitle',
        'donation_description',
        'donation_points',
        'volunteer_section_image',
        'volunteer_section_heading',
        'volunteer_section_link_text',
        'volunteer_section_link',
        'donation_section_image',
        'donation_section_heading',
        'donation_section_link_text',
        'donation_section_link',
        'support_donation_title',
        'support_donation_subtitle',
        'support_donation_description',
        'support_donation_points',
        'helping_donation_section_subtitle',
        'helping_donation_section_heading',
        'helping_donation_section_link_text',
        'helping_donation_section_link',
        'press_title',
        'press_logo',
        'last_section_subtitle',
        'last_section_heading',
        'last_section_points',
        'last_section_link_text',
        'last_section_link',
    ];

    public function pressLogo()
    {
        return $this->hasMany(Media::class, 'id', 'press_logo');
    }
}
