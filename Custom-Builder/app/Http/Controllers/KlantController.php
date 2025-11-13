<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klant;

class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $zoek = $request->input('q');

        $query = Klant::with('facturen');

        if ($zoek) {
            $query->where(function ($q) use ($zoek) {
                $q->where('naam', 'like', "%{$zoek}%")
                    ->orWhere('email', 'like', "%{$zoek}%");
            });
        }

        $klanten = $query->orderBy('naam')->get();

        foreach ($klanten as $klant) {
            $klant->aantal_facturen = $klant->facturen->count();
            $klant->openstaand = $klant->facturen
                ->where('status', '!=', 'betaald')
                ->sum('totaal_incl_btw');
        }

        return view('klanten.index', compact('klanten', 'zoek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klanten.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'naamm' => 'required|string|max:255',
            'email' => 'required|email|unique:klanten,email',
            'telefoonnummer' => 'nullable|string|max:50',
            'adres' => 'nullable|string|max:255',
            'stad' => 'nullable|string|max:100',
        ]);

        $klant = Klant::create($data);

        return redirect()->route('klanten.show', $klant->id)
            ->with('success', 'Klant succesvul aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $klant = Klant::with('facturen.regels')->findOrFail($id);

        $openstaand = $klant->facturen
            ->where('status', '!=', 'betaald')
            ->sum('totaal_incl_btw');

        $totaalGefactureerd = $klant->facturen->sum('totaal_incl_btw');

        return view('klanten.show', compact('klant', 'openstaand', 'totaalGefactureerd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $klant = Klant::findOrFail($id); // ✅ correct
        return view('klanten.edit', compact('klant'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $klant = Klant::findOrFail($id);

        $data = $request->validate([
            'naamm' => 'required|string|max:255',
            'email' => 'required|email|unique:klanten,email,' . $klant->id,
            'telefoonnummer' => 'nullable|string|max:50',
            'adres' => 'nullable|string|max:255',
            'stad' => 'nullable|string|max:100',
        ]);

        $klant->update($data);

        return redirect()->route('klanten.show', $klant->id)
            ->with('success', 'Klant bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $klant = Klant::findOrFail($id);
        $klant->delete();

        return redirect()->route('klanten.index')
            ->with('succes', 'Klant verwijderd.');
    }
}
