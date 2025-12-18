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

Route::get('/characters', [CharactersController::class, 'index'])->name('characters.index');

Route::get('/characters/create', [CharactersController::class, 'create'])->name('characters.create');

Route::post('/characters', [CharactersController::class, 'store'])->name('characters.store');

Route::resource('characters', CharactersController::class);

Route::get('/regions', [RegionsController::class, 'index'])->name('regions.index');

Route::get('/regions/create', [RegionsController::class, 'create'])->name('regions.create');

require __DIR__.'/auth.php';
