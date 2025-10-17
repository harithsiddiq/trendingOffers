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
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'tiktok_url')) {
                $table->dropColumn('tiktok_url');
            }
            if (Schema::hasColumn('users', 'instagram_url')) {
                $table->dropColumn('instagram_url');
            }
            if (Schema::hasColumn('users', 'whatsapp_url')) {
                $table->dropColumn('whatsapp_url');
            }
            if (Schema::hasColumn('users', 'x_url')) {
                $table->dropColumn('x_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tiktok_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('x_url')->nullable();
        });
    }
};