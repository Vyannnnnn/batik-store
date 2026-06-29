<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthSafetySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'badge',
        'description',
        'image',
        'image_alt',
        'features',
        'button_text',
        'button_link',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}