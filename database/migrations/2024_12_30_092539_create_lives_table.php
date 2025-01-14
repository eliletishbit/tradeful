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
        Schema::create('lives', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre du live
            $table->text('description'); // Description du live
            $table->timestamp('scheduled_at'); // Date et heure programmées du live
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur qui a créé le live
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lives');
    }
};
