<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'image',
        'show_in_store',
        'show_in_menu',
        'product_code',
        'manual_order',
        'taxes',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'show_in_store' => 'boolean',
        'show_in_menu' => 'boolean',
        'manual_order' => 'integer',
        'taxes' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(ProductItem::class);
    }
}
