<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'scat_id',
        'name',
        'slug',
        'price',
        'discount',
        'whole_sale_price',
        'sales_price',
        'min_whole_sale_quan',
        'image',
        'description',
        'size',
        'color',
        'brand_id',
    ];

    public function sub_cat()
    {
        return $this->hasMany("App\Models\Category", 'pid');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
