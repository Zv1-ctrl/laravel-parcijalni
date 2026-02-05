<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj proizvod
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('proizvodi.storenew') }}">
                    @csrf

                    {{-- Naziv --}}
                    <div class="mb-4">
                        <x-input-label for="naziv" value="Naziv" />
                        <x-text-input id="naziv" name="naziv" class="mt-1 block w-full"
                                      :value="old('naziv')" />
                        <x-input-error :messages="$errors->get('naziv')" class="mt-2" />
                    </div>

                    {{-- Količina --}}
                    <div class="mb-4">
                        <x-input-label for="kolicina" value="Količina" />
                        <x-text-input id="kolicina" name="kolicina" type="number"
                                      class="mt-1 block w-full"
                                      :value="old('kolicina')" min="0" />
                        <x-input-error :messages="$errors->get('kolicina')" class="mt-2" />
                    </div>

                    {{-- Cijena --}}
                    <div class="mb-4">
                        <x-input-label for="cijena" value="Cijena" />
                        <x-text-input id="cijena" name="cijena" type="number" step="0.01"
                                      class="mt-1 block w-full"
                                      :value="old('cijena')" min="0" />
                        <x-input-error :messages="$errors->get('cijena')" class="mt-2" />
                    </div>

                    {{-- Kategorija --}}
                    <div class="mb-4">
                        <x-input-label for="kategorija_id" value="Kategorija" />
                        <select name="kategorija_id" id="kategorija_id"
                                class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">-- Odaberi kategoriju --</option>

                            @foreach ($kategorije as $k)
                                <option value="{{ $k->id }}"
                                    @selected(old('kategorija_id') == $k->id)>
                                    {{ $k->naziv }}
                                </option>
                            @endforeach

                            {{-- NOVO --}}
                            <option value="new"
                                @selected(old('kategorija_id') === 'new')>
                                + Kreiraj novu kategoriju...
                            </option>
                        </select>

                        <x-input-error :messages="$errors->get('kategorija_id')" class="mt-2" />
                    </div>

                    {{-- NOVO: Nova kategorija --}}
                    <div class="mb-6" id="novaKategorijaBox" style="display: none;">
                        <x-input-label for="nova_kategorija_naziv" value="Naziv nove kategorije" />
                        <x-text-input id="nova_kategorija_naziv"
                                      name="nova_kategorija_naziv"
                                      class="mt-1 block w-full"
                                      :value="old('nova_kategorija_naziv')" />
                        <x-input-error :messages="$errors->get('nova_kategorija_naziv')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Spremi</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Minimalni JS – samo show/hide, bez dizajna --}}
    <script>
        const select = document.getElementById('kategorija_id');
        const box = document.getElementById('novaKategorijaBox');

        function toggleNewCategoryBox() {
            box.style.display = (select.value === 'new') ? 'block' : 'none';
        }

        select.addEventListener('change', toggleNewCategoryBox);
        toggleNewCategoryBox(); // radi i nakon validation redirecta
    </script>
</x-app-layout>