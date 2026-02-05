@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('title','Varijable')

@section('content')

<h2>Popis proizvoda</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Količina</th>
            <th>Cijena (€)</th>
            <th>Ukupno</th>
            <th>Rok isteka</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proizvodi as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->naziv }}</td>
            <td>{{ $p->kolicina }}</td>
            <td>{{ $p->cijena }}</td>
            <td>{{ $p->kolicina * $p->cijena }}</td>
            <td>{{ Carbon::parse($p->rokisteka)->format('d.m.Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection