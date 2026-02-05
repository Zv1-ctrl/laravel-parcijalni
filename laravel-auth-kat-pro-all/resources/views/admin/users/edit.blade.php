<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uredi korisnika
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    {{-- Ime --}}
                    <div class="mb-4">
                        <x-input-label for="name" value="Ime" />
                        <x-text-input id="name" name="name" class="mt-1 block w-full"
                            :value="old('name', $user->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email"
                            class="mt-1 block w-full"
                            :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Datum rođenja --}}
                    <div class="mb-4">
                        <x-input-label for="datumrod" value="Datum rođenja" />
                        <x-text-input id="datumrod" name="datumrod" type="date"
                            class="mt-1 block w-full"
                            :value="old('datumrod', optional($user->datumrod)->format('Y-m-d'))" />
                        <x-input-error :messages="$errors->get('datumrod')" class="mt-2" />
                    </div>

                    {{-- Tip korisnika --}}
                    <div class="mb-6">
                        <x-input-label for="usertype" value="Tip korisnika" />
                        <select name="usertype" id="usertype"
                            class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="1" @selected(old('usertype', $user->usertype) == 1)>
                                Korisnik
                            </option>
                            <option value="0" @selected(old('usertype', $user->usertype) == 0)>
                                Admin
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            Spremi
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>