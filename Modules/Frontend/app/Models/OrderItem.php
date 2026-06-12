<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Backend\Models\ProductItem;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_item_id',
        'product_title',
        'item_title',
        'item_code',
        'color_name',
        'size_value',
        'quantity',
        'unit_price',
        'total_price',
    ];

    protected $casts = [
        'order_id' => 'integer',
        'product_item_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function productItem(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class);
    }
}
