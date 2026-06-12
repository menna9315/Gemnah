<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductItemImage extends Model
{
    protected $fillable = [
        'product_item_id',
        'image',
        'item_order',
    ];

    protected $casts = [
        'product_item_id' => 'integer',
        'item_order' => 'integer',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }
}
