<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAvailability extends Model
{
    use HasFactory;
    
    public $table = 'seat_availabilities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
