<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogGameActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provider_id',
        'game_id',
        'ip_address',
        'browser',
    ];

    public function game()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
