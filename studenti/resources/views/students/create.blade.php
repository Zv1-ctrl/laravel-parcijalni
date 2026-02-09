@extends('layout')

@section('content')
<h1>Novi student</h1>

<form method="POST" action="{{ route('students.store') }}">
@csrf

<input name="ime" placeholder="Ime">
<input name="prezime" placeholder="Prezime">

<select name="status">
    <option value="redovni">Redovni</option>
    <option value="izvanredni">Izvanredni</option>
</select>

<input name="godiste" placeholder="Godište">
<input name="prosjek" placeholder="Prosjek">

<button>Spremi</button>
</form>
@endsection
