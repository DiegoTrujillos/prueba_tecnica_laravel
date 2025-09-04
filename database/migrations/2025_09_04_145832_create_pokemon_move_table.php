<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_move', function (Blueprint $table) {
            $table->foreignId('pokemon_id')->constrained()->onDelete('cascade');
            $table->foreignId('move_id')->constrained()->onDelete('cascade');
            $table->primary(['pokemon_id', 'move_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_move');
    }
};
