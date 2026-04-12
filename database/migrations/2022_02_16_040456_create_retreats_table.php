<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetreatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('retreats')) {
            Schema::create('retreats', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->date('from')->nullable();
                $table->date('to')->nullable();
                $table->string('nights')->nullable();
                $table->string('days')->nullable();
                $table->string('share_room')->nullable();
                $table->string('private_room')->nullable();
                $table->string('order')->nullable();
                $table->string('price')->nullable();
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retreats');
    }
}
