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
        Schema::create('yoga_certificates', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('yoga_class_id')->nullable();
            // $table->foreign('yoga_class_id')->references('id')->on('yoga_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yoga_certificates');
    }
};
