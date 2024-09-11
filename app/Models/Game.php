<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['user_id', 'choices', 'items', 'current_stage'];

    protected $casts = [
        'choices' => 'array',
        'items' => 'array',
    ];
}
