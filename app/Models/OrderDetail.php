<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // protected $primaryKey = 'id';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function order()
{
    return $this->belongsTo(Order::class, 'order_id');
}
}

