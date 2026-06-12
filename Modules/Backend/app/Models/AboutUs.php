<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'description',
        'paragraph_order',
        'image',
        'image2',
        'button_title',
        'button_url',
    ];
}
