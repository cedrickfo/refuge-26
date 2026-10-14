<x-layouts.app>

    <h1>{{ $animal->name }}</h1>

    @if ($animal->isAdopted())
    <x-badge variant="adopted">
        Adopté
    </x-badge>
@endif

    <p>Espèce : {{ $animal->species->label() }}</p>

    <p>Refuge : {{ $animal->shelter->name }}</p>
    @if ($animal->age() !== null)
    <p>Âge : {{ $animal->age() }} ans</p>
@else
    <p>Âge inconnu</p>
@endif

<h2>Traits de caractère</h2>

@foreach ($animal->tags as $tag)

      <x-badge variant="tag">  {{ $tag->name }}  </x-badge>

@endforeach


<h2>Description</h2>

@if ($animal->description)
    <p>{{ $animal->description }}</p>
@else
    <p>Aucune description disponible.</p>
@endif



</x-layouts.app>
