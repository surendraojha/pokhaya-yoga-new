<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('name');
            $table->string('desg');
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->bigInteger('team_category_id')->index()->unsigned();
            $table->timestamps();
            $table->foreign('team_category_id')
            ->references('id')
            ->on('team_categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_teams');
    }
}
