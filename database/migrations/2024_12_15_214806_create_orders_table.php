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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('orderStatus_id')->references('id')->on('orderStatus')->onDelete('cascade');
            // $table->enum('payment_method')->nullable();
            $table->decimal(10,2)('total_price')->nullable();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
