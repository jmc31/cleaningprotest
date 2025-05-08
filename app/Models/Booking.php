<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Booking extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'email',
        'address',
        'type_of_cleaning',
        'date',
        'time',
        'payment_method',
        'status'
    ];
}
