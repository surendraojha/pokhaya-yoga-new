<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('yoga_classes', function (Blueprint $table) {
            $table->string('trainer')->nullable();
            $table->string('date')->nullable();
            $table->string('level')->nullable();
            $table->text('members')->nullable();
            $table->text('accomodation_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('yoga_classes', function (Blueprint $table) {
            $table->dropColumn([
                'trainer',
                'date',
                'level',
                'members',
                'accomodation_text',
            ]);
        });
    }
};
