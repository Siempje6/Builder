@extends('layout.app')

@section('content')
<h2>Klant bewerken: {{ $klant->naamm }}</h2>

<form method="POST" action="{{ route('klanten.update', $klant->id) }}">
    @csrf
    @method('PUT')
    <label>Naam:</label>
    <input type="text" name="naamm" value="{{ old('naamm', $klant->naamm) }}" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $klant->email) }}" required>
    <br>
    <label>Telefoon:</label>
    <input type="text" name="telefoonnummer" value="{{ old('telefoonnummer', $klant->telefoonnummer) }}">
    <br>
    <label>Adres:</label>
    <input type="text" name="adres" value="{{ old('adres', $klant->adres) }}">
    <br>
    <label>Stad:</label>
    <input type="text" name="stad" value="{{ old('stad', $klant->stad) }}">
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection
