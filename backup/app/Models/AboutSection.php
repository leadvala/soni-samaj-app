<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'image1',
        'image2',
        'since_counter',
        'title',
        'subtitle',
        'description',
    ];

    // Define the relationship with AboutTab (One-to-Many)
    public function aboutTabs()
    {
        return $this->hasMany(AboutTab::class);
    }
}
