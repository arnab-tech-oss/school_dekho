<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_profile extends Model
{
    use HasFactory;
    
    protected $table = "student_profiles";

    protected $fillable = [
        'fname',
        'phone',
        'pin'
    ];

    
}
