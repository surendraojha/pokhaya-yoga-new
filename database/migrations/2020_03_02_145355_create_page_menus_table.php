<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('all_page_id')->unsigned()->index();
            $table->bigInteger('our_menu_id')->unsigned()->index();
            $table->bigInteger('order')->nullable();
            $table->timestamps();
            $table->foreign('all_page_id')
            ->references('id')
            ->on('all_pages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('our_menu_id')
            ->references('id')
            ->on('our_menus')
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
        Schema::dropIfExists('page_menus');
    }
}
