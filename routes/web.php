<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::redirect('/', '/animaux');

Route::view('/composants', 'styleguide')->name('styleguide');

Route::get('/animaux', [AnimalController::class, 'index'])
    ->name('animals.index');

Route::get('/animaux/nouveau', [AnimalController::class, 'create'])
    ->name('animals.create');

    Route::post('/animaux', [AnimalController::class, 'store'])
    ->name('animals.store');
    
 Route::get('/animaux/{id}', [AnimalController::class, 'show'])
    ->name('animals.show');
