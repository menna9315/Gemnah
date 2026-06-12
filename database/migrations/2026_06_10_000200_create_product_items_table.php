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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->longText('description2')->nullable();
            $table->string('image')->nullable();
            $table->string('home_image')->nullable();
            $table->string('item_code')->nullable();
            $table->unsignedInteger('manual_order')->default(0);
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('original_price', 10, 2)->default(0);
            $table->decimal('discount_value', 10, 2)->default(0);
            $table->decimal('price_after_discount', 10, 2)->default(0);
            $table->decimal('taxes', 8, 2)->default(0);
            $table->foreignId('color_id')->nullable()->constrained('colors')->nullOnDelete();
            $table->foreignId('size_id')->nullable()->constrained('sizes')->nullOnDelete();
            $table->string('fabric')->nullable();
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_out_of_stock')->default(false);
            $table->string('size_chart_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->boolean('show_in_store')->default(true);
            $table->boolean('show_in_menu')->default(true);
            $table->timestamps();

            $table->index(['product_id', 'manual_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
