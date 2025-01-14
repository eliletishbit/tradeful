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
        Schema::create('idee_businesses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre de l'idée de business
            $table->text('description'); // Description de l'idée de business
            $table->string('pdf_file')->nullable(); // Chemin vers le PDF de formation, s'il existe.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur qui a créé l'idée de business.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idee_businesses');
    }
};
