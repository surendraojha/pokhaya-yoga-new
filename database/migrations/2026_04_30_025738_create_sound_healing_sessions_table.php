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
        Schema::create('sound_healing_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sound_healing_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('time');
            $table->string('title');
            $table->string('spots_left')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sound_healing_sessions');
    }
};
