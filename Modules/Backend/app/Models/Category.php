<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'collection_id',
        'title',
        'slug',
        'category_order',
        'description',
        'image',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'show_in_store',
        'show_in_menu',
    ];

    protected $casts = [
        'collection_id' => 'integer',
        'category_order' => 'integer',
        'show_in_store' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
