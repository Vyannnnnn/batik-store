<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'motif',
        'size',
        'image_path',
        'shopee_url',
        'tokopedia_url',
        'whatsapp_text',
        'booking_link',
        'is_active',
    ];

    protected $casts = [
        'price' => 'integer',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageUrlAttribute()
    {
        if (empty($this->image_path)) {
            return null;
        }
        return asset('storage/' . $this->image_path);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}