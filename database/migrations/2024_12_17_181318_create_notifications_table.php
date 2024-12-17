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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // مفتاح خارجي لجدول المستخدمين
            $table->string('notification_type'); // يجب استخدام string بدلاً من varchar
            $table->string('message'); // يجب استخدام string بدلاً من varchar
            $table->timestamp('sent_at')->nullable(); // حقل تاريخ الإرسال
            $table->boolean('is_read')->default(false); // حقل لتحديد إذا كانت الإشعار مقروء أم لا
            $table->timestamps(); // تاريخ الإنشاء والتعديل
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
