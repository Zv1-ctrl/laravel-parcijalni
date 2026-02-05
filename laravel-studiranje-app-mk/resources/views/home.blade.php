@extends('layouts.app')

@section('title', 'Početna')
@section('page_title', 'Početna')

@section('content')
  <p>Dobrodošli u mini aplikaciju Studenti/Fakulteti.</p>

  <a class="btn" href="{{ route('studenti.index') }}">Studenti</a>
  <a class="btn" href="{{ route('fakulteti.index') }}">Fakulteti</a>
@endsection
