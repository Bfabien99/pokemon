<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;
    protected $fillable = [
        'pokemon_id',
        'pokemon_name',
        'pokemon_image_url',
        'user_id',
    ];
}
