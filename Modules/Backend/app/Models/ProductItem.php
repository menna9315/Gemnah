<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductItem extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'slug',
        'description',
        'description2',
        'image',
        'home_image',
        'item_code',
        'manual_order',
        'stock_quantity',
        'selling_price',
        'original_price',
        'discount_value',
        'price_after_discount',
        'taxes',
        'color_id',
        'size_id',
        'fabric',
        'is_best_seller',
        'is_featured',
        'is_out_of_stock',
        'size_chart_image',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'show_in_store',
        'show_in_menu',
    ];

    protected $casts = [
        'product_id' => 'integer',
        'manual_order' => 'integer',
        'stock_quantity' => 'integer',
        'selling_price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'discount_value' => 'decimal:2',
        'price_after_discount' => 'decimal:2',
        'taxes' => 'decimal:2',
        'color_id' => 'integer',
        'size_id' => 'integer',
        'is_best_seller' => 'boolean',
        'is_featured' => 'boolean',
        'is_out_of_stock' => 'boolean',
        'show_in_store' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function itemImages(): HasMany
    {
        return $this->hasMany(ProductItemImage::class);
    }

    public function costs(): HasMany
    {
        return $this->hasMany(ProductItemCost::class);
    }
}
