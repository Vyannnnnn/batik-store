<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero
        'hero_title', 'hero_subtitle', 'hero_badge', 'hero_image',
        'hero_button_text', 'hero_button_link',
        
        // Product
        'product_section_label', 'product_section_title',
        'product_title', 'product_motif', 'product_description',
        'product_image', 'product_booking_link', 'product_badge',
        
        // Dinoyo
        'dinoyo_section_label', 'dinoyo_section_title', 'dinoyo_section_description',
        
        // Instagram
        'instagram_title', 'instagram_subtitle', 'instagram_username',
        'instagram_url', 'instagram_is_active',
        
        // Map
        'map_title', 'map_address', 'map_url', 'map_button_text',
        'map_description', 'map_operational_hours', 'map_closed_day',
        'map_is_active',
        
        'is_active',
    ];

    protected $casts = [
        'instagram_is_active' => 'boolean',
        'map_is_active' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getHeroImageUrlAttribute()
    {
        if (!$this->hero_image) return null;
        if (filter_var($this->hero_image, FILTER_VALIDATE_URL)) {
            return $this->hero_image;
        }
        return asset('storage/' . $this->hero_image);
    }

    public function getProductImageUrlAttribute()
    {
        if (!$this->product_image) return null;
        if (filter_var($this->product_image, FILTER_VALIDATE_URL)) {
            return $this->product_image;
        }
        return asset('storage/' . $this->product_image);
    }
}