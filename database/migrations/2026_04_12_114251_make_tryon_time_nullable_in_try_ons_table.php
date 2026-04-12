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
    Schema::table('try_ons', function (Blueprint $table) {
        $table->dateTime('tryon_time')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('try_ons', function (Blueprint $table) {
        $table->dateTime('tryon_time')->nullable(false)->change();
    });
}
};
