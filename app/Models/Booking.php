<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'package_id','amount_to_be_paid','name', 'customer_id', 'email', 'phone', 'address', 'numberOfAttendants', 'room_type', 'actual_price', 'referred_by','created_at','updated_at'
    ];
}
