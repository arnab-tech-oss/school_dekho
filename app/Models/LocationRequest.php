<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_per_day'
    ];
}
