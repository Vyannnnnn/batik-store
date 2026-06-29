<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_title',
        'header_subtitle',
        'header_description',
        'address_title',
        'address',
        'instagram_title',
        'instagram_username',
        'instagram_url',
        'instagram_description',
        'form_title',
        'form_description',
        'form_button_text',
        'form_link',
        'form_footer_text',
        'maps_title',
        'maps_subtitle',
        'maps_embed',
        'maps_footer',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}