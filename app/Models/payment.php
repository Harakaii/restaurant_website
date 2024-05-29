<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    // protected $primaryKey = 'id';
    protected $fillable = [
        'order_id', 'payment_type'
    ];

}
