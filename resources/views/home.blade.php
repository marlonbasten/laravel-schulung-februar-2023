@extends('layouts.base')

@section('title', 'Startseite')

@section('content')
    <p>Hallo Laravel!</p>

    <p>Name: {{ $name }}</p>

    @if ($age >= 18)
        <p>Glückwunsch, du darfst Bier trinken!</p>
    @else
        <p>Warte noch ein paar Jahre!</p>
    @endif
@endsection
