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

        Schema::create('klanten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('contact_persoon')->nullable();
            $table->string('email')->unique();
            $table->string('telefoonnummer')->nullable();
            $table->string('btw_nummer')->nullable();
            $table->string('adres')->nullable();
            $table->string('post_code')->nullable();
            $table->string('stad')->nullable();
            $table->string('land')->nullable();
            $table->text('notitie')->nullable();
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
