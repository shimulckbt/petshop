<?php

namespace App\Models;

use App\Models\OrderInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderInfo(){
        return $this->belongsTo(OrderInfo::class, 'order_no');
    }
}
