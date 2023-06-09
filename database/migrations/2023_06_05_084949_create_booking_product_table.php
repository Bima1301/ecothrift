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
        Schema::create('BookingProduct', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->string('status')->default('pending');
            $table->string('code')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->integer('quantity');
            $table->text('address');
            $table->string('province');
            $table->string('city');
            $table->string('postal_code');
            $table->string('district');
            $table->string('shipping')->default('JNE');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BookingProduct');
    }
};
