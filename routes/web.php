<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::redirect('/', '/animaux');

Route::view('/composants', 'styleguide')->name('styleguide');

Route::get('/animaux', [AnimalController::class, 'index'])
    ->name('animals.index');

 Route::get('/animaux/{id}', [AnimalController::class, 'show'])
    ->name('animals.show');
