<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'xml_id',
        'available',
        'url',
        'price',
        'currency',
        'category_id',
        'pictures',
        'pickup',
        'delivery',
        'name',
        'name_ua',
        'vendor',
        'description',
        'description_ua',
        'params',
    ];

    protected $casts = [
        'available' => 'boolean',
        'pickup' => 'boolean',
        'delivery' => 'boolean',
        'pictures' => 'array',
        'params' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
