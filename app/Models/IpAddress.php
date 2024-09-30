<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $connection = 'sqlite_ips';
    protected $fillable = ['start_ip', 'end_ip'];
}
