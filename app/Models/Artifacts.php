<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artifacts extends Model
{
    protected $table = 'artifacts';
    protected $fillable = [
        'name',
        'piece',
        'set_bonus',
        'rarity',
    ];
}
