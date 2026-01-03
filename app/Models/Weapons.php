<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    protected $table = 'weapons';
    protected $fillable = ['name', 'weapon_type', 'base_attack','sub_stat_type', 'sub_stat','rarity', 'passive'];
}
