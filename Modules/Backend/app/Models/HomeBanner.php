<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'image_order',
        'button',
        'button_url',
    ];
}
