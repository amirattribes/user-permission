<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

     protected $fillable = [
        'category_id','name', 'description', 'price', 'image', 'is_active','stock','sort_order'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}