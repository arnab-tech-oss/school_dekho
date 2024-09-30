<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouselorLogin extends Model
{
    use HasFactory;
    protected $fillable = ["counselor_id", "ip_address", "api_token", "logout_time", "device_name", "device_id"];
}
