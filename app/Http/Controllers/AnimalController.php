<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\View\View;

class AnimalController extends Controller
{
     public function index(): View
    {
        $animals = Animal::whereNull('adopted_at')
            ->orderBy('name')
            ->get();

        return view('animals.index', [
            'animals' => $animals
        ]);
    }

 public function show(int $id): View
{
    $animal = Animal::findOrFail($id);

    return view('animals.show', [
        'animal' => $animal
    ]);
}

}




