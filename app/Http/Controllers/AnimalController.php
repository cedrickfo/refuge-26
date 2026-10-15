<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Animal;
use Illuminate\View\View;
use App\Models\Shelter;
use App\Enums\Species;
use Illuminate\Validation\Rule;

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
  $validated = $request->validate([
    'name' => ['required', 'string', 'max:50'],
        'species' => ['required', Rule::enum(Species::class)],
         'shelter_id' => ['required', 'integer', 'exists:shelters,id'],
          'birth_date' => ['nullable', 'date', 'before_or_equal:today'],
          'description' => ['nullable', 'string', 'max:1000'],
]);

    $animal = Animal::create($validated);

    return redirect()
        ->route('animals.show', $animal->id)
        ->with('status', "L'animal a été ajouté.");
}

}




