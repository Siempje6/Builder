@extends('layout.app')

@section('content')
<a href="{{ route('klanten.index') }}">&larr; Terug naar overzicht</a>

<h2>{{ $klant->naamm }}</h2>
<p><strong>Contactpersoon:</strong> {{ $klant->contact_persoon }}</p>
<p><strong>Email:</strong> {{ $klant->email }}</p>
<p><strong>Telefoon:</strong> {{ $klant->telefoonnummer ?? '-' }}</p>
<p><strong>Adres:</strong> {{ $klant->adres ?? '-' }}, {{ $klant->stad ?? '-' }}</p>
<p><strong>BTW-nummer:</strong> {{ $klant->btw_nummer ?? '-' }}</p>
<p><strong>Notities:</strong> {{ $klant->notitie ?? '-' }}</p>

<h3>Openstaand bedrag: €{{ number_format($openstaand, 2, ',', '.') }}</h3>

<h3>Facturen</h3>
@if($klant->facturen->count())
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Datum</th>
            <th>Factuurnummer</th>
            <th>Status</th>
            <th>Totaal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($klant->facturen as $factuur)
        <tr>
            <td>{{ $factuur->id }}</td>
            <td>{{ $factuur->datum }}</td>
            <td>{{ $factuur->factuurnummer }}</td>
            <td>{{ $factuur->status }}</td>
            <td>€{{ number_format($factuur->totaal_incl_btw, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="5">
                <strong>Regels:</strong>
                <ul>
                    @foreach($factuur->regels as $regel)
                        <li>{{ $regel->beschrijving }} — {{ $regel->aantal }} × €{{ number_format($regel->prijs_per_stuk,2,',','.') }} = €{{ number_format($regel->totaal,2,',','.') }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Deze klant heeft nog geen facturen.</p>
@endif
@endsection
