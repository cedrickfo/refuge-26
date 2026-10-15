<x-layouts.app>

    <h1>Ajouter un animal</h1>

    <form method="POST" action="{{ route('animals.store') }}">
        @csrf

        <x-label for="name">Nom de l'animal</x-label>

        <x-input id="name" name="name" type="text" :value="old('name')" :aria-invalid="$errors->has('name') ? 'true' : 'false'" :aria-describedby="$errors->has('name') ? 'name-error' : null"
            @class(['border-red-500' => $errors->has('name')]) />
        @error('name')
            <p id="name-error" class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        <x-label for="species">Espèce</x-label>

        <x-select id="species" name="species" :aria-invalid="$errors->has('species') ? 'true' : 'false'" :aria-describedby="$errors->has('species') ? 'species-error' : null" @class(['border-red-500' => $errors->has('species')])>
            <option value="">Choisir une espèce</option>

            @foreach (\App\Enums\Species::cases() as $species)
                <option value="{{ $species->value }}" @selected(old('species') == $species->value)>
                    {{ $species->label() }}
                </option>
            @endforeach

        </x-select>

        @error('species')
            <p id="species-error" class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        <x-label for="shelter_id">Refuge</x-label>

        <x-select id="shelter_id" name="shelter_id" :aria-invalid="$errors->has('shelter_id') ? 'true' : 'false'" :aria-describedby="$errors->has('shelter_id') ? 'shelter_id-error' : null" @class(['border-red-500' => $errors->has('shelter_id')])>
            <option value="">Choisir un refuge</option>

            @foreach ($shelters as $shelter)
                <option value="{{ $shelter->id }}" @selected(old('shelter_id') == $shelter->id)>
                    {{ $shelter->name }}
                </option>
            @endforeach

        </x-select>

        @error('shelter_id')
            <p id="shelter_id-error" class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror


        <x-label for="birth_date">Date de naissance</x-label>

        <x-input id="birth_date" name="birth_date" type="date" :value="old('birth_date')" :aria-invalid="$errors->has('birth_date') ? 'true' : 'false'" :aria-describedby="$errors->has('birth_date') ? 'birth_date-error' : null"
            @class(['border-red-500' => $errors->has('birth_date')]) />
        @error('birth_date')
            <p id="birth_date-error" class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        <x-label for="description">Description</x-label>

        <x-textarea id="description" name="description" :aria-invalid="$errors->has('description') ? 'true' : 'false'" :aria-describedby="$errors->has('description') ? 'description-error' : null"
            @class(['border-red-500' => $errors->has('description')])>{{ old('description') }}</x-textarea>

        @error('description')
            <p id="description-error" class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

        <x-button type="submit">
            Enregistrer
        </x-button>

    </form>

</x-layouts.app>
