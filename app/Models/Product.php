<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'motif',
        'size',
        'image_path',
        'shopee_url',
        'tokopedia_url',
        'whatsapp_text',
    ];
}
