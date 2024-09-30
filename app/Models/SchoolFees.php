<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFees extends Model
{
    use HasFactory;
    protected $fillable = ['pre_nursery', 'nursery', 'lkg', 'ukg', 'kg', 'class_one', 'class_two', 'class_three', 'class_four', 'class_five', 'class_six', 'class_seven', 'class_eight', 'class_nine', 'class_ten', 'class_eleven', 'class_twelve'];
}
