<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'seo_title',
        'seo_description',
        'seo_keywords',
        'google_analytics',
        'facebook_pixel',
        'google_search_console',
        'facebook_app_id',
        'twitter_card',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
    ];

    // Optional: Set the storage path for the file columns if needed
    public function getSitemapUrlAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }

    public function getRobotsTxtAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }
}
