<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRefundPolicyParagraph extends Model
{
    protected $fillable = [
        'title',
        'description',
        'paragraph_order',
    ];
}
