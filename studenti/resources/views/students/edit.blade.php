@extends('layout')

@section('content')
<h1>Uredi studenta</h1>

<form method="POST" action="{{ route('students.update', $student) }}">
@csrf
@method('PUT')

<input name="ime" value="{{ $student->ime }}">
<input name="prezime" value="{{ $student->prezime }}">

<select name="status">
    <option value="redovni" {{ $student->status=='redovni'?'selected':'' }}>Redovni</option>
    <option value="izvanredni" {{ $student->status=='izvanredni'?'selected':'' }}>Izvanredni</option>
</select>

<input name="godiste" value="{{ $student->godiste }}">
<input name="prosjek" value="{{ $student->prosjek }}">

<button>Spremi</button>
</form>
@endsection
