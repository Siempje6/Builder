<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactuurRegel extends Model
{
    protected $table = 'factuur_regels';
    protected $fillable = [
        'factuur_id', 'beschrijving', 'aantal', 'prijs_per_stuk', 'totaal'
    ];

    public function factuur()
    {
        return $this->belongsTo(Factuur::class, 'factuur_id');
    }
}
