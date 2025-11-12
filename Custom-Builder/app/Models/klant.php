<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $table = 'klanten'; // omdat het niet 'customers' heet
    protected $fillable = [
        'name', 'contact_person', 'email', 'phone', 'vat_number', 
        'address', 'postal_code', 'city', 'country', 'notes'
    ];

    // Een klant heeft veel facturen
    public function facturen()
    {
        return $this->hasMany(Factuur::class, 'klant_id');
    }
}
