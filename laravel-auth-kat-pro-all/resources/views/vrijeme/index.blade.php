<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vrijeme
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Dohvat prognoze za grad --}}
            <div class="bg-white shadow sm:rounded-lg p-6 mb-6">
                <form method="POST" action="{{ route('vrijeme.fetch') }}">
                    @csrf

                    <div class="flex gap-4 items-end">
                        <div class="flex-1">
                            <x-input-label for="grad" value="Grad (npr. Zagreb, Croatia)" />
                            <x-text-input id="grad" name="grad" class="mt-1 block w-full"
                                          :value="old('grad')" />
                            <x-input-error :messages="$errors->get('grad')" class="mt-2" />
                        </div>

                        <div>
                            <x-primary-button>Dohvati</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Pretraga spremljenih --}}
            <div class="bg-white shadow sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('vrijeme.index') }}">
                    <div class="flex gap-4 items-end">
                        <div class="flex-1">
                            <x-input-label for="q" value="Pretraga po gradu" />
                            <x-text-input id="q" name="q" class="mt-1 block w-full"
                                          :value="request('q')" placeholder="Upiši dio naziva grada..." />
                        </div>
                        <div class="flex gap-2">
                            <x-primary-button>Traži</x-primary-button>
                            <a href="{{ route('vrijeme.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-200">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Tablica --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="font-semibold mb-4">Spremljene prognoze</h3>

                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border px-3 py-2">Grad</th>
                            <th class="border px-3 py-2">Datum</th>
                            <th class="border px-3 py-2">Max Temp (°C)</th>
                            <th class="border px-3 py-2">Vrijeme</th>
                            <th class="border px-3 py-2">Vjetar</th>
                            <th class="border px-3 py-2">Vidljivost</th>
                            <th class="border px-3 py-2">Zadnji dohvat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prognoze as $p)
                            <tr>
                                <td class="border px-3 py-2">{{ $p->grad }}</td>
                                <td class="border px-3 py-2">{{ $p->datum->format('d.m.Y') }}</td>
                                <td class="border px-3 py-2">{{ $p->maxTempC ?? '-' }}</td>
                                <td class="border px-3 py-2">{{ $p->weather ?? '-' }}</td>
                                <td class="border px-3 py-2">{{ $p->windSpeed ?? '-' }}</td>
                                <td class="border px-3 py-2">{{ $p->visibility ?? '-' }}</td>
                                <td class="border px-3 py-2">{{ $p->zadnji_dohvat?->format('d.m.Y H:i') ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border px-3 py-3 text-gray-600" colspan="7">
                                    Nema spremljenih prognoza.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4 flex justify-center">
                    {{ $prognoze->links() }}
                </div>

                {{-- Osvježi za grad iz search polja --}}
                <div class="mt-4">
                    <form method="POST" action="{{ route('vrijeme.refresh') }}">
                        @csrf
                        <input type="hidden" name="grad" value="{{ request('q') }}">
                        <x-primary-button
                            :disabled="!request('q')"
                        >
                            Osvježi (grad iz pretrage)
                        </x-primary-button>

                        @if(!request('q'))
                            <p class="text-sm text-gray-500 mt-2">Upiši grad u pretragu da bi mogao osvježiti.</p>
                        @endif
                    </form>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>