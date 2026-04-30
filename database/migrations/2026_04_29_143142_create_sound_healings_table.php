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
        Schema::create('sound_healings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('date')->nullable();
            $table->string('tripe_room')->nullable();
            $table->string('shared_room')->nullable();
            $table->string('private_room')->nullable();



            $table->text('what_to_expect_title')->nullable();
            $table->text('what_to_expect_subtitle')->nullable();
            $table->text('what_to_expect')->nullable();


            $table->text('content');

            $table->unsignedBigInteger('teacher_id');

            $table->string('student_taught')->nullable();
            $table->string('experience_year')->nullable();
            $table->string('workshop_lead')->nullable();


            $table->string('image')->nullable();

            $table->string('background_image')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sound_healings');
    }
};
