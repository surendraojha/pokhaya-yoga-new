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
        Schema::table('questions', function (Blueprint $table) {
            if (Schema::hasColumn('questions', 'timezone')) {
                $table->dropColumn('timezone');
            }

            if (Schema::hasColumn('questions', 'time_slots')) {
                $table->dropColumn('time_slots');
            }
            if (!Schema::hasColumn('questions', 'timezone_configurations')) {

                $table->json('timezone_configurations')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('timezone_configurations');
            $table->string('timezone');
            $table->text('time_slots');
        });
    }
};
