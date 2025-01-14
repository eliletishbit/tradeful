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
        Schema::table('signaux', function (Blueprint $table) {
            //
            $table->decimal('entry_price', 10, 5)->change();
            $table->decimal('stop_loss', 10, 5)->change();
            $table->decimal('sl', 10, 5)->nullable()->change();
            $table->decimal('be', 10, 5)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signaux', function (Blueprint $table) {
            //
            $table->decimal('entry_price', 8, 2)->change();
            $table->decimal('stop_loss', 8, 2)->change();
            $table->decimal('sl', 8, 2)->nullable()->change();
            $table->decimal('be', 8, 2)->nullable()->change();
        });
    }
};
