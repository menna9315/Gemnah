<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingPolicyParagraph extends Model
{
    protected $fillable = [
        'title',
        'description',
        'paragraph_order',
    ];
}
