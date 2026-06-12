<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    protected $fillable = [
        'city',
        'amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function (ShippingFee $shippingFee) {
            $shippingFee->singleton_key = 1;
        });
    }
}
