<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaToAllPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_pages', function (Blueprint $table) {
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
        Schema::table('all_pages', function (Blueprint $table) {
            $table->dropColumn('meta_keyword');
            $table->dropColumn('meta_des');
        });
    }
}
