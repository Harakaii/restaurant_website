<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'shipping_id', 'order_total','coupon_discount'
    ];
    protected $guarded = [];
    protected $primaryKey = 'order_id';
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Shipping', 'shipping_id');
    }

}
