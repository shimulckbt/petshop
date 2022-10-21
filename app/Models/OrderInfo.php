<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderInfo extends Model
{
    use HasFactory;
    
    protected $table = 'order_infos';
    // protected $primaryKey = 'order_no';
    protected $guarded = [];

    public function orders(){
        return $this->hasMany(Order::class, 'order_no', 'order_no');
    }
}
