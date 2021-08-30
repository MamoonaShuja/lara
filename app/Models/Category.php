<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pid',
    ];

    public function sub_cat()
    {
        return $this->hasMany("App\Models\Category", 'pid');
    }

    public function cat()
    {
        return $this->belongsTo("App\Models\Category", 'pid');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
