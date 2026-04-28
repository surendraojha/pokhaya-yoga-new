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
        Schema::table('offers', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable()->comment('Description displayed in hero section');
            $table->json('hero_stats')->nullable()->comment('Array of hero stat cards with big_text and small_text');
            $table->json('features_list')->nullable()->comment('Array of features with icon and text');
            $table->json('learn_items')->nullable()->comment('Array of learning items with title and description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn([
                'features_list',
                'learn_items',
                'hero_description',
                'hero_title',
                'hero_stats',
            ]);
        });
    }
};
