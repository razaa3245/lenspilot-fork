<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('try_ons', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('customer_id');
            $table->string('status')->default('pending')->after('image_url');
        });
    }

    public function down(): void
    {
        Schema::table('try_ons', function (Blueprint $table) {
            $table->dropColumn(['image_url', 'status']);
        });
    }
};