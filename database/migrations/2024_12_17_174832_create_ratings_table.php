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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // مفتاح خارجي لجدول الطلبات
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // مفتاح خارجي لجدول المستخدمين
            $table->integer('rating')->unsigned()->default(0); // التقييم (عادة ما يكون بين 1 إلى 5 أو 1 إلى 10)
            $table->string('comment')->nullable(); // تعليق التقييم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
