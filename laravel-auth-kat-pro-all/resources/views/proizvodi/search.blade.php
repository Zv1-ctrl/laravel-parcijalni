<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pretraga proizvoda
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- SEARCH FORMA --}}
            <div class="bg-white shadow sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('proizvodi.search') }}">
                    <div class="flex gap-4 items-end">

                        <div class="flex-1">
                            <x-input-label for="naziv" value="Naziv proizvoda" />
                            <x-text-input
                                id="naziv"
                                name="naziv"
                                class="mt-1 block w-full"
                                :value="request('naziv')"
                                placeholder="Unesite naziv proizvoda" />
                        </div>

                        <div>
                            <x-primary-button>
                                Traži
                            </x-primary-button>
                        </div>

                    </div>
                </form>
            </div>

            {{-- REZULTATI --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="font-semibold mb-4">
                    Rezultati pretrage
                </h3>

                @if ($proizvodi->isEmpty())
                    <p class="text-gray-600">
                        Nema rezultata za traženi pojam.
                    </p>
                @else
                    <table class="min-w-full border" width="100%">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border px-3 py-2">ID</th>
                                <th class="border px-3 py-2">Naziv</th>
                                <th class="border px-3 py-2">Količina</th>
                                <th class="border px-3 py-2">Cijena</th>
                                <th class="border px-3 py-2">Kategorija</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proizvodi as $p)
                                <tr>
                                    <td class="border px-3 py-2">{{ $p->id }}</td>
                                    <td class="border px-3 py-2">{{ $p->naziv }}</td>
                                    <td class="border px-3 py-2">{{ $p->kolicina }}</td>
                                    <td class="border px-3 py-2">{{ number_format($p->cijena, 2) }}</td>
                                    <td class="border px-3 py-2">{{ $p->kategorija->naziv }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>