<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Backend\Models\ProductItem;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_item_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    protected $casts = [
        'cart_id' => 'integer',
        'product_item_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function productItem(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class);
    }
}
