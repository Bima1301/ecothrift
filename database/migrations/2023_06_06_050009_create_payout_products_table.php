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
        Schema::create('payout_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_product_id')->constrained('bookingproduct')->onDelete('cascade');
            $table->string('payment_method');
            $table->string('paid_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payout_products');
    }
};
