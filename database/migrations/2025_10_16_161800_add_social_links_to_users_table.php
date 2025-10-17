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
            $table->string('tiktok_url')->nullable()->after('cr_image');
            $table->string('instagram_url')->nullable()->after('tiktok_url');
            $table->string('whatsapp_url')->nullable()->after('instagram_url');
            $table->string('x_url')->nullable()->after('whatsapp_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tiktok_url', 'instagram_url', 'whatsapp_url', 'x_url']);
        });
    }
};