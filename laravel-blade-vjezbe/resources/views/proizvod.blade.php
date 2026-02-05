@extends('layouts.main')

@section('title','Varijable')

@section('content')

<h2>Prikaz varijabli iz kontrolera</h2>
<p>
    <strong>Naziv proizvoda:</strong> {{ $naziv }}
</p>
<p>
    <strong>Količina proizvoda:</strong> {{ $kolicina }}
</p>
<p>
    <strong>Cijena proizvoda:</strong> {{ $cijena }}
    @if($cijena > 1000)
    <span class="visoka"> - Previsoka cijena</span>
    @else
    <span class="pristojna"> - Pristojna cijena</span>
    @endif
</p>
<p>
    <strong>Ukupna vrijednost:</strong> {{ $kolicina * $cijena }} €
</p>

@endsection