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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // مفتاح خارجي لجدول الطلبات
            $table->enum('status', ['paid', 'unpaid', 'pending'])->default('unpaid'); // حالة الفاتورة: مدفوعة، غير مدفوعة، معلقة
            $table->decimal('total_amount', 10, 2); // مبلغ الفاتورة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
