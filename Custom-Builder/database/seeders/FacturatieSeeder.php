<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Klant;
use App\Models\Factuur;
use App\Models\FactuurRegel;
use Carbon\Carbon;

class FacturatieSeeder extends Seeder
{
    public function run(): void
    {
        $klant = Klant::create([
            'naam' => 'Test Klant BV',
            'contact_persoon' => 'Jan de Vries',
            'email' => 'jan@example.com',
            'telefoonnummer' => '0612345678',
            'btw_nummer' => 'NL123456789B01',
            'adres' => 'Kerkstraat 12',
            'post_code' => '1017GH',
            'stad' => 'Amsterdam',
            'land' => 'Nederland',
            'notitie' => 'Bel altijd eerst even voor levering.',
        ]);

        for ($f = 1; $f <= 2; $f++) {
            $factuurnummer = '2025-' . str_pad($f, 3, '0', STR_PAD_LEFT);
            $datum = Carbon::now()->subDays($f * 5);
            $vervaldatum = (clone $datum)->addDays(30);

            $factuur = Factuur::create([
                'klant_id' => $klant->id,
                'factuurnummer' => $factuurnummer,
                'datum' => $datum,
                'vervaldatum' => $vervaldatum,
                'totaal_excl_btw' => 0,
                'btw_bedrag' => 0,
                'totaal_incl_btw' => 0,
                'status' => $f == 1 ? 'betaald' : 'verzonden',
                'notities' => 'Automatisch aangemaakte testfactuur',
            ]);

            $regels = [
                ['beschrijving' => 'Website onderhoud', 'aantal' => 2, 'prijs_per_stuk' => 50.00],
                ['beschrijving' => 'Domeinnaam registratie', 'aantal' => 1, 'prijs_per_stuk' => 12.50],
            ];

            $totaalExcl = 0;

            foreach ($regels as $regel) {
                $regelTotaal = $regel['aantal'] * $regel['prijs_per_stuk'];
                FactuurRegel::create([
                    'factuur_id' => $factuur->id,
                    'beschrijving' => $regel['beschrijving'],
                    'aantal' => $regel['aantal'],
                    'prijs_per_stuk' => $regel['prijs_per_stuk'],
                    'totaal' => $regelTotaal,
                ]);

                $totaalExcl += $regelTotaal;
            }

            $btw = round($totaalExcl * 0.21, 2);
            $factuur->update([
                'totaal_excl_btw' => $totaalExcl,
                'btw_bedrag' => $btw,
                'totaal_incl_btw' => $totaalExcl + $btw,
            ]);
        }
    }
}
