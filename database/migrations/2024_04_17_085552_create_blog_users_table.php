<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blog_users')) {

            Schema::create('blog_users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('position')->nullable();
                $table->string('social_media_url1')->nullable();
                $table->string('social_media_url2')->nullable();
                $table->integer('year_of_experience')->nullable();
                $table->text('about')->nullable();
                $table->text('education')->nullable();
                $table->text('experience')->nullable();
                $table->string('image')->nullable();
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
        Schema::dropIfExists('blog_users');
    }
}
