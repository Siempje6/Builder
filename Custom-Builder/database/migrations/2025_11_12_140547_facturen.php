<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klanten')->onDelete('cascade');

            $table->string('factuurnummer')->unique();
            $table->date('datum');
            $table->date('vervaldatum')->nullable();
            $table->decimal('totaal_excl_btw', 10, 2)->default(0);
            $table->decimal('btw_bedrag', 10, 2)->default(0);
            $table->decimal('totaal_incl_btw', 10, 2)->default(0);
            $table->string('status')->default('concept');
            $table->date('betaald_op')->nullable();
            $table->text('notities')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
