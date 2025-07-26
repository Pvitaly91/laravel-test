<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The primary key type is non-incrementing.
     */
    public $incrementing = false;

    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'parent_id',
        'name',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
