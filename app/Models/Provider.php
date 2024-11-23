<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_name',
        'provider_slug',
        'provider_code',
        'provider_type',
        'provider_position',
        'provider_image',
        'provider_status',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'provider_id', 'id');
    }
}
