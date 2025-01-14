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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre de l'analyse
            $table->text('description'); // Description de l'analyse
            $table->string('image'); // Chemin vers l'image
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur qui a créé l'analyse
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
