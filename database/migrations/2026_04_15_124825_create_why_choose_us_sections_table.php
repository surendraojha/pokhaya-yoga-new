<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();

            // Section content
            $table->string('title');
            $table->string('subtitle')->nullable();

            // Lists (left & right)
            $table->json('left_list')->nullable();
            $table->json('right_list')->nullable();

            // Images (store paths)
            $table->json('images')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('why_choose_us');
    }
};
