<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaToBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
              $table->string('order')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_des')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
              $table->dropColumn('order');
            $table->dropColumn('meta_keyword');
            $table->dropColumn('meta_des');
        });
    }
}
