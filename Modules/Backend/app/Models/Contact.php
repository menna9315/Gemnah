<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'phone1',
        'phone2',
        'email',
        'instgram_link',
        'facebook_link',
        'tiktok_link',
    ];
}
