<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationOtp extends Model
{
    use HasFactory;

    protected $fillable = ["mobile", "otp", "hash_key", "status"];
}
