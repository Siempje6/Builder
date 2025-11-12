<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factuur_regels', function (Blueprint $table) {
            $table->id();
            // Koppeling met de factuur
            $table->foreignId('factuur_id')->constrained('facturen')->onDelete('cascade');
            
            // Inhoud van de regel
            $table->string('beschrijving');             // Wat is het product of de dienst
            $table->integer('aantal')->default(1);      // Hoeveel stuks
            $table->decimal('prijs_per_stuk', 10, 2);   // Prijs per stuk
            $table->decimal('totaal', 10, 2);           // Totaal (aantal × prijs_per_stuk)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factuur_regels');
    }
};
