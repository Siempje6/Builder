

@extends('layout.app')

@section('content')

<h2>Overzicht</h2>

<form method="GET" action="{{ route('klanten.index') }}" style="margin-bottom: 10px;">
    <input type="text" name="q" value="{{ $zoek ?? '' }}" placeholder="Zoek op naam of e-mail">
    <button type="submit">Zoek</button>
    <a href="{{ route('klanten.index') }}">Reset</a>
</form>

<a href="{{ route('klanten.create') }}">Nieuwe klant toevoegen</a>

@if($klanten->count())
    <table class="klanten-tabel">
        <thead>
            <tr>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Telefoon</th>
                <th>Aantal facturen</th>
                <th>Openstaand</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($klanten as $klant)
            <tr>
                <td>{{ $klant->naamm }}</td>
                <td>{{ $klant->email }}</td>
                <td>{{ $klant->telefoonnummer ?? '-' }}</td>
                <td>{{ $klant->facturen->count() }}</td>
                <td>€{{ number_format($klant->facturen->where('status', '!=', 'betaald')->sum('totaal_incl_btw'), 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('klanten.show', $klant->id) }}">Bekijk</a> |
                    <a href="{{ route('klanten.edit', $klant->id) }}">Bewerk</a> |
                    <form method="POST" action="{{ route('klanten.destroy', $klant->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je het zeker?')">Verwijder</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Geen klanten gevonden.</p>
@endif

@endsection


<style>
    .klanten-tabel {
        border-top-left-radius: 10px;
    }
</style>

