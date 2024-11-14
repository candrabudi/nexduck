<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'api_credential_id',
        'category_id',
        'provider_api_id',
        'provider_id',
        'game_code',
        'game_name',
        'game_image',
        'game_status',
        'game_provider_code',
    ];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function provider()
    {
        return $this->hasOne(Provider::class, 'id', 'provider_id');
    }
}
