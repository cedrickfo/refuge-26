<x-layouts.app>

    <h1>Ajouter un animal</h1>

    <form method="POST" action="{{ route('animals.store') }}">
        @csrf

        <x-label for="name">Nom de l'animal</x-label>

        <x-input id="name" name="name" type="text" />

        <x-label for="species">Espèce</x-label>

        <x-select id="species" name="species">
            <option value="">Choisir une espèce</option>

            @foreach (\App\Enums\Species::cases() as $species)
                <option value="{{ $species->value }}">
                    {{ $species->label() }}
                </option>
            @endforeach

        </x-select>

        <x-label for="shelter_id">Refuge</x-label>

        <x-select id="shelter_id" name="shelter_id">
            <option value="">Choisir un refuge</option>

            @foreach ($shelters as $shelter)
                <option value="{{ $shelter->id }}">
                    {{ $shelter->name }}
                </option>
            @endforeach

        </x-select>


        <x-label for="birth_date">Date de naissance</x-label>

<x-input
    id="birth_date"
    name="birth_date"
    type="date"
/>

<x-label for="description">Description</x-label>

<x-textarea
    id="description"
    name="description"
></x-textarea>


<x-button type="submit">
    Enregistrer
</x-button>

    </form>

</x-layouts.app>
