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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('show_in_store')->default(true);
            $table->boolean('show_in_menu')->default(true);
            $table->string('product_code')->nullable();
            $table->unsignedInteger('manual_order')->default(0);
            $table->decimal('taxes', 8, 2)->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
