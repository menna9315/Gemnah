<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'show_in_store',
        'show_in_menu',
    ];

    protected $casts = [
        'show_in_store' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
