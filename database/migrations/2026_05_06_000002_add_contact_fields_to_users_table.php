<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('password');
            $table->string('street_address')->nullable()->after('phone');
            $table->string('unit_apartment')->nullable()->after('street_address');
            $table->string('city')->nullable()->after('unit_apartment');
            $table->string('country')->nullable()->after('city');
            $table->string('postal_code')->nullable()->after('country');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'street_address', 'unit_apartment', 'city', 'country', 'postal_code']);
        });
    }
};
