<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    //has one to many relationship with users table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    //has one to many relationship with company_payments table
    public function company_payment()
    {
        return $this->hasMany(CompanyPayment::class, 'company_id');
    }
}
