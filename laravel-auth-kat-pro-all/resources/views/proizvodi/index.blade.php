<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proizvodi {{ app()->getLocale() }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                @if (session('status'))
                    <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="min-w-full border" width="100%">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border px-3 py-2">IDD</th>
                            <th class="border px-3 py-2">Naziv</th>
                            <th class="border px-3 py-2">Količina</th>
                            <th class="border px-3 py-2">Cijena</th>
                            <th class="border px-3 py-2">Kategorija</th>

                            @if(auth()->user()->usertype === 0)
                                <th class="border px-3 py-2">Akcije</th>
                            @endif
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

                                @if(auth()->user()->usertype === 0)
                                    <td class="border px-3 py-2 flex justify-center">
                                        <a href="{{ route('proizvodi.edit', $p) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3">
                                          <i class="bi bi-pencil icon-edit"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <form method="POST"
                                              action="{{ route('proizvodi.destroy', $p) }}"
                                              class="inline"
                                              onsubmit="return confirm('Obrisati proizvod?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline">
                                                <i class="bi bi-trash icon-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    {{ $proizvodi->links() }}
                </div>

                    <div class="mt-4">
                        <a href="{{ route('proizvodi.create') }}"
                           class="text-blue-600 buttonadd">
                            Novi proizvod
                        </a>
                        
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('proizvodi.createnew') }}"
                           class="text-blue-600 buttonadd">
                            Novi proizvod 2
                        </a>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>