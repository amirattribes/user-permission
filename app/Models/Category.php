<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'category_id','name', 'description', 'price', 'image', 'is_active','stock',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}