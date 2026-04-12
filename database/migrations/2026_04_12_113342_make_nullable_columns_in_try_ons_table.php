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
        $table->unsignedBigInteger('customer_id')->nullable()->change();
        $table->unsignedBigInteger('shop_id')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('try_ons', function (Blueprint $table) {
        $table->unsignedBigInteger('customer_id')->nullable(false)->change();
        $table->unsignedBigInteger('shop_id')->nullable(false)->change();
    });
}
};
