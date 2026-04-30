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
        Schema::table('our_teams', function (Blueprint $table) {
            if (!Schema::hasColumn('our_teams', 'instagram')) {
                $table->string('instagram')->nullable();
            }
            if (!Schema::hasColumn('our_teams', 'facebook')) {
                $table->string('facebook')->nullable();
            }
            if (!Schema::hasColumn('our_teams', 'youtube')) {
                $table->string('youtube')->nullable();
            }
            if (!Schema::hasColumn('our_teams', 'whatsapp')) {
                $table->string('whatsapp')->nullable();
            }
        });

        Schema::table('sound_healings', function (Blueprint $table) {

            if (!Schema::hasColumn('sound_healings', 'slug')) {
                $table->string('slug')->nullable();
            }

            if (!Schema::hasColumn('sound_healings', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('sound_healings', 'meta_description')) {
                $table->string('meta_description')->nullable();
            }
            if (!Schema::hasColumn('sound_healings', 'meta_keyword')) {
                $table->string('meta_keyword')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_teams', function (Blueprint $table) {
            if (Schema::hasColumn('our_teams', 'instagram')) {
                $table->dropColumn('instagram');
            }

            if (Schema::hasColumn('sound_healings', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('our_teams', 'facebook')) {
                $table->dropColumn('facebook');
            }
            if (Schema::hasColumn('our_teams', 'youtube')) {
                $table->dropColumn('youtube');
            }
            if (Schema::hasColumn('our_teams', 'whatsapp')) {
                $table->dropColumn('whatsapp');
            }
        });

        Schema::table('sound_healings', function (Blueprint $table) {
            if (Schema::hasColumn('sound_healings', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
            if (Schema::hasColumn('sound_healings', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('sound_healings', 'meta_keyword')) {
                $table->dropColumn('meta_keyword');
            }
        });
    }
};
