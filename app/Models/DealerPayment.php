<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealerPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dealer_payments';

    //has one to many relationship with dealers table
    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }
}
