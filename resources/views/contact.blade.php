@extends('layouts.base')

@section('title', 'Kontakt')

@section('content')

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ihr Name">
        <br>
        <textarea name="message" placeholder="Ihr Anliegen an uns">{{ old('message') }}</textarea>
        <br><br>
        <input type="submit" value="Abschicken">
    </form>

@endsection
