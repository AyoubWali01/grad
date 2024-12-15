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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();  // المفتاح الرئيسي
            $table->string('category_name');  // اسم التصنيف
            $table->text('description')->nullable();  // الوصف يمكن أن يكون فارغًا
            $table->string('category_icon')->nullable();  // أيقونة التصنيف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
