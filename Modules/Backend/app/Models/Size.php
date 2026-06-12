<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'value',
        'size_chart_image',
    ];
}
