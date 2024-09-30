<?php

namespace App\Enum;

class OtpStatus
{
    public static $pending = 0;
    public  static $fail = 1;
    public  static $delivered = 2;
    public  static $verified = 3;
}
