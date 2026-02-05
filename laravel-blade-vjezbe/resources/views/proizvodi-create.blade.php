@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('title','Varijable')

@section('content')

<h2>Unos proizvoda</h2>

<form method="POST" action="{{route('proizvodi.store')}}" class="form-box" enctype="multipart/form-data">

    @csrf

    <label>ID:</label>
    <input type="number" name="id" value="{{ $nextId }}" readonly>

    <label>Naziv:</label>
    <input type="text" name="naziv">

    <label>Količina:</label>
    <input type="number" name="kolicina">

    <label>Cijena (€):</label>
    <input type="number" step="0.01" name="cijena">

    <label>Rok isteka:</label>
    <input type="date" name="rokisteka">

    <label>Slika proizvoda:</label>
    <input type="file" name="slika">

    <button type="submit">Spremi proizvod</button>
</form>

@endsection