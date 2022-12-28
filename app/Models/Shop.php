<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "shops";

    //has one to one relationship with shop types table
    public function shop_type()
    {
        return $this->belongsTo(ShopType::class, 'shop_type_id');
    }

    //has one to many relationship with users table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //has one to many relationship with salemans table
    public function saleman()
    {
        return $this->hasMany(Saleman::class, 'shop_id');
    }
}
