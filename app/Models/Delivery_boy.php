<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_boy extends Model
{
    protected $fillable = [
        'delevery_boy_name','delevery_boy_phone_number','delevery_boy_password','delevery_boy_status','added_on'
    ];
    protected $primaryKey = 'delevery_boy_id';
}
