<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artifacts extends Model
{
    protected $table = 'artifacts';
    protected $fillable = [
        'name',
        'two_piece_bonus',
        'four_piece_bonus',
        'rarity',
    ];
}
