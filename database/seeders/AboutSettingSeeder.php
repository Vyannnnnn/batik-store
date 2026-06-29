<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'apa_title',
        'apa_description',
        'apa_image',
        'mengapa_title',
        'mengapa_description',
        'mengapa_image',
        'mengapa_poin_1',
        'mengapa_poin_2',
        'mengapa_poin_3',
        'cerita_title',
        'cerita_paragraf_1',
        'cerita_paragraf_2',
        'cerita_paragraf_3',
        'cerita_hashtag',
        'proses_title',
        'proses_1',
        'proses_2',
        'proses_3',
        'proses_4',
        'nilai_title',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'nilai_4',
        'nilai_5',
        'nilai_6',
        'book_title',
        'book_description',
        'book_link',
        'book_button_text',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getApaImageUrlAttribute()
    {
        if (!$this->apa_image) return null;
        if (filter_var($this->apa_image, FILTER_VALIDATE_URL)) {
            return $this->apa_image;
        }
        return asset('storage/' . $this->apa_image);
    }

    public function getMengapaImageUrlAttribute()
    {
        if (!$this->mengapa_image) return null;
        if (filter_var($this->mengapa_image, FILTER_VALIDATE_URL)) {
            return $this->mengapa_image;
        }
        return asset('storage/' . $this->mengapa_image);
    }
}