<x-layouts.app>

    <h1>Les animaux à adopter</h1>
 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

  @forelse ($animals as $animal)

    <x-card>

       <x-slot:image>
        <img
            src="{{ asset($animal->species->image()) }}"
            alt="{{ $animal->species->label() }}"
            class="h-24 w-24 object-contain"
        >
    </x-slot:image>

    <x-badge variant="species">
    {{ $animal->species->label() }}
</x-badge>

        <h2>
    <a href="{{ route('animals.show', $animal->id) }}">
        {{ $animal->name }}
    </a>
       </h2>

        <p>{{ $animal->shelter->name }}</p>
    </x-card>

@empty

    <p>Aucun animal</p>

@endforelse

</x-layouts.app>
