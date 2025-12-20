<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\RegionsController;
use App\Models\Characters;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $characters = Characters::all();
    return Inertia::render('Home',[
        'characters' => $characters
    ]);
})->name('home');

Route::resource('characters', CharactersController::class);

Route::resource('regions', RegionsController::class);

require __DIR__.'/auth.php';
