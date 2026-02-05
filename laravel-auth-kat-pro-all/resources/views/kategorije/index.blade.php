<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategorije
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('status'))
                        <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full border" width="100%">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border px-3 py-2 text-left">ID</th>
                                    <th class="border px-3 py-2 text-left">Naziv</th>
                                    <th class="border px-3 py-2 text-left">Aktivna</th>

                                    @if (auth()->user()->usertype === 0)
                                        <th class="border px-3 py-2 text-left">Akcije</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategorije as $k)
                                    <tr>
                                        <td class="border px-3 py-2">{{ $k->id }}</td>
                                        <td class="border px-3 py-2">{{ $k->naziv }}</td>
                                        <td class="border px-3 py-2">{{ $k->aktivna ? 'Da' : 'Ne' }}</td>

                                        @if (auth()->user()->usertype === 0)
                                            <td class="border px-3 py-2">
                                                <a href="{{ route('kategorije.edit', $k) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3">
                                                   <i class="bi bi-pencil icon-edit"></i>
                                                </a>

                                                <form method="POST"
                                                      action="{{ route('kategorije.destroy', $k) }}"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Obrisati kategoriju?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">
                                                        <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if (auth()->user()->usertype === 0)
                        <div class="mt-4">
                            <a href="{{ route('kategorije.create') }}"
                               class="text-blue-600 hover:underline buttonadd">
                                Nova kategorija
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>