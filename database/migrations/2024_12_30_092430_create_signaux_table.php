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
        Schema::create('signaux', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre du signal
            $table->decimal('entry_price', 10, 2); // Prix d'entrée
            $table->decimal('stop_loss', 10, 2); // Stop Loss
            $table->decimal('sl', 10, 2)->nullable(); // SL (si existant)
            $table->decimal('be', 10, 2)->nullable(); // BE (si existant)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur qui a créé le signal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signaux');
    }
};
