<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uredi proizvod
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('proizvodi.update', $proizvod) }}">
                    @csrf
                    @method('PUT')

                    {{-- Naziv --}}
                    <div class="mb-4">
                        <x-input-label for="naziv" value="Naziv" />
                        <x-text-input id="naziv" name="naziv" class="mt-1 block w-full"
                                      :value="old('naziv', $proizvod->naziv)" required />
                        <x-input-error :messages="$errors->get('naziv')" class="mt-2" />
                    </div>

                    {{-- Količina --}}
                    <div class="mb-4">
                        <x-input-label for="kolicina" value="Količina" />
                        <x-text-input id="kolicina" name="kolicina" type="number"
                                      class="mt-1 block w-full"
                                      :value="old('kolicina', $proizvod->kolicina)" min="0" required />
                        <x-input-error :messages="$errors->get('kolicina')" class="mt-2" />
                    </div>

                    {{-- Cijena --}}
                    <div class="mb-4">
                        <x-input-label for="cijena" value="Cijena" />
                        <x-text-input id="cijena" name="cijena" type="number" step="0.01"
                                      class="mt-1 block w-full"
                                      :value="old('cijena', $proizvod->cijena)" min="0" required />
                        <x-input-error :messages="$errors->get('cijena')" class="mt-2" />
                    </div>

                    {{-- Kategorija --}}
                    <div class="mb-6">
                        <x-input-label for="kategorija_id" value="Kategorija" />
                        <select name="kategorija_id" id="kategorija_id"
                                class="mt-1 block w-full border-gray-300 rounded-md">
                            @foreach ($kategorije as $k)
                                <option value="{{ $k->id }}"
                                    @selected(old('kategorija_id', $proizvod->kategorija_id) == $k->id)>
                                    {{ $k->naziv }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kategorija_id')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Spremi</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>