<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj kategoriju
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('kategorije.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="naziv" value="Naziv" />
                        <x-text-input id="naziv" name="naziv" class="mt-1 block w-full"
                                      :value="old('naziv')" required />
                        <x-input-error :messages="$errors->get('naziv')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="aktivna" value="Aktivna" />
                        <select name="aktivna" id="aktivna"
                                class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="1" @selected(old('aktivna', '1') == '1')>Da</option>
                            <option value="0" @selected(old('aktivna') == '0')>Ne</option>
                        </select>
                        <x-input-error :messages="$errors->get('aktivna')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Spremi</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>