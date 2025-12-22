<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ArtifactsController;
use App\Models\Characters;
use App\Models\Regions;
use App\Models\Artifacts;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $characters = Characters::all();
    $regions = Regions::all();
    $artifacts = Artifacts::all();
    return Inertia::render('Home',[
        'characters' => $characters,
        'regions' => $regions,
        'artifacts' => $artifacts,
    ]);
})->name('home');

Route::resource('characters', CharactersController::class);

Route::resource('regions', RegionsController::class);

Route::resource('artifacts', ArtifactsController::class);

require __DIR__.'/auth.php';
