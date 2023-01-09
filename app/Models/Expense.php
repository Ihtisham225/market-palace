<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'expenses';

    //has one to many relationship with shops table
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
