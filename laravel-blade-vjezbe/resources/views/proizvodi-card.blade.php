@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@section('title','Varijable')

@section('content')

<h2>Popis proizvoda</h2>

@foreach($proizvodi as $p)
    <x-card :proizvod="$p">
     @if($p->cijena > 1000)
        <p class="visoka"> - Skupi proizvod</p>
    @else
        <p class="pristojna"> - Povoljan proizvod</p>
    @endif
    </x-card>  
@endforeach
@endsection