<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Animal;
use Illuminate\View\View;
use App\Models\Shelter;

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

public function create(): View
{
    $shelters = Shelter::orderBy('name')->get();

    return view('animals.create', [
        'shelters' => $shelters
    ]);
}



public function store(Request $request): RedirectResponse
{
    $animal = Animal::create($request->only([
        'name',
        'species',
        'shelter_id',
        'birth_date',
        'description',
    ]));

    return redirect()
        ->route('animals.show', $animal->id)
        ->with('status', "L'animal a été ajouté.");
}

}




