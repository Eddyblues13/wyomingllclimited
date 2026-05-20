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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('card_number');
            $table->string('card_holder_name');
            $table->string('card_type'); // visa, mastercard, amex, discover
            $table->decimal('balance', 16, 2);
            $table->string('wallet_name');
            $table->string('cvv', 4);
            $table->string('expiry_date', 5); // MM/YY
            $table->string('status')->default('active'); // active, blocked
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
