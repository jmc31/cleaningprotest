<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'type_of_cleaning', 'date', 'time', 'status'
    ];
}
