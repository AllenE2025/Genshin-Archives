<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharactersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/characters', [CharactersController::class, 'index'])->name('characters.index');

Route::get('/characters/create', [CharactersController::class, 'create'])->name('characters.create');

Route::post('/characters', [CharactersController::class, 'store'])->name('characters.store');

Route::resource('characters', CharactersController::class);

require __DIR__.'/auth.php';
