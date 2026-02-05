<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Popis korisnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('status'))
                    <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full border" width="100%">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border px-3 py-2 text-left">ID</th>
                                    <th class="border px-3 py-2 text-left">Ime</th>
                                    <th class="border px-3 py-2 text-left">Email</th>
                                    <th class="border px-3 py-2 text-left">Datum rođenja</th>
                                    <th class="border px-3 py-2 text-left">Tip</th>
                                    <th class="border px-3 py-2 text-left">Datum ažuriranja</th>
                                    <th class="border px-3 py-2 text-left">Akcije</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td class="border px-3 py-2">{{ $u->id }}</td>
                                        <td class="border px-3 py-2">{{ $u->name }}</td>
                                        <td class="border px-3 py-2">{{ $u->email }}</td>
                                        <td class="border px-3 py-2">
                                            {{ $u->datumrod ? $u->datumrod->format('d.m.Y') : '-' }}
                                        </td>
                                        <td class="border px-3 py-2">
                                            {{ $u->usertype === 0 ? 'Admin' : 'Korisnik' }}
                                        </td>
                                        <td class="border px-3 py-2">
                                            {{ $u->updated_at->format('d.m.Y H:i:s') }}
                                        </td>
                                        <td class="border px-3 py-2">
                                            <a href="{{ route('admin.users.edit', $u) }}"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-3"
                                                title="Uredi">
                                                    <i class="bi bi-pencil icon-edit"></i>
                                                    </a>                                                 
                                             @if ($u->id !== auth()->id())
                                                <form method="POST"
                                                    action="{{ route('admin.users.destroy', $u) }}"
                                                    style="display: inline"
                                                    onsubmit="return confirm('Jeste li sigurni da želite obrisati ovog korisnika?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="inline-flex items-center text-red-600 hover:text-red-800"
                                                        title="Obriši">
                                                    <i class="bi bi-trash icon-delete"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">
                                                    <i class="bi bi-trash icon-delete"></i>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>