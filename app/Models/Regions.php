<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    protected $table = 'regions';
    protected $fillable = [
        'name',
        'description',
        'local_specialty',
        'elite_boss',
        'world_boss',
    ];
}
