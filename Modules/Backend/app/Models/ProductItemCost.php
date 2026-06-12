<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductItemCost extends Model
{
    protected $fillable = [
        'product_item_id',
        'name',
        'value',
    ];

    protected $casts = [
        'product_item_id' => 'integer',
        'value' => 'decimal:2',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }
}
