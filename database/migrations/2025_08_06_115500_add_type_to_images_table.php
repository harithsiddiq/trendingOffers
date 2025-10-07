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
        Schema::table('store_images', function (Blueprint $table) {
            $table->enum('type', ['main', 'normal', 'menu'])->default('normal')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_images', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
