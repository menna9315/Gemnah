<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video',
        'display_at_home',
    ];

    protected $casts = [
        'display_at_home' => 'boolean',
    ];
}
