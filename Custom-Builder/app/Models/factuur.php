<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factuur extends Model
{
    protected $table = 'facturen';
    protected $fillable = [
        'klant_id', 'factuurnummer', 'datum', 'vervaldatum', 
        'totaal_excl_btw', 'btw_bedrag', 'totaal_incl_btw', 
        'status', 'betaald_op', 'notities'
    ];

    // Factuur hoort bij één klant
    public function klant()
    {
        return $this->belongsTo(Klant::class, 'klant_id');
    }

    // Factuur heeft meerdere regels
    public function regels()
    {
        return $this->hasMany(FactuurRegel::class, 'factuur_id');
    }
}
