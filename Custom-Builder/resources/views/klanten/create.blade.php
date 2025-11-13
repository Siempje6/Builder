@extends('layouts.app')

@section('content')
<h2>Nieuwe klant toevoegen</h2>

<form method="POST" action="{{ route('klanten.store') }}">
    @csrf
    <label>Naam:</label>
    <input type="text" name="naamm" value="{{ old('naamm') }}" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <br>
    <label>Telefoon:</label>
    <input type="text" name="telefoonnummer" value="{{ old('telefoonnummer') }}">
    <br>
    <label>Adres:</label>
    <input type="text" name="adres" value="{{ old('adres') }}">
    <br>
    <label>Stad:</label>
    <input type="text" name="stad" value="{{ old('stad') }}">
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection
