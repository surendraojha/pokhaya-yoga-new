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
        Schema::rename('why_choose_us', 'why_come_to_pokhara');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::rename('why_come_to_pokhara', 'why_choose_us');
    }
};
