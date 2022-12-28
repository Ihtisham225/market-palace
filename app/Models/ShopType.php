<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "shop_types";

    //has one to one relationship with shops table
    public function shop()
    {
        return $this->hasOne(Shop::class, 'shop_type_id');
    }


    //has one to one relationship with brands table
    public function brand()
    {
        return $this->hasMany(Brand::class, 'shop_type_id');
    }


    //has one to one relationship with categories table
    public function category()
    {
        return $this->hasMany(Category::class, 'shop_type_id');
    }
}
