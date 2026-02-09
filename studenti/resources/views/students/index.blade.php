@extends('layout')

@section('content')
<h1>Lista studenata</h1>

<a href="{{ route('students.create') }}">Dodaj studenta</a>

<p>Redovni: {{ $statistika['redovni'] }}</p>
<p>Izvanredni: {{ $statistika['izvanredni'] }}</p>

<table>
<tr>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Status</th>
    <th>Godište</th>
    <th>Prosjek</th>
    <th>Akcije</th>
</tr>

@foreach($students as $s)
<tr>
<td>{{ $s->ime }}</td>
<td>{{ $s->prezime }}</td>
<td>{{ $s->status }}</td>
<td>{{ $s->godiste }}</td>
<td>{{ $s->prosjek }}</td>
<td>
    <a href="{{ route('students.edit', $s) }}">Uredi</a>

    <form action="{{ route('students.destroy', $s) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button>Obriši</button>
    </form>
</td>
</tr>
@endforeach
</table>
@endsection
