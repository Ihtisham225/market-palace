<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company_payments';

    //has one to many relationship with companies table
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
