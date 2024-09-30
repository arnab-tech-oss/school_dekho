<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolEligibility extends Model
{
    use HasFactory;
    protected $fillable = ['school_id', 'min_qualification', 'max_qualification', 'pre_nursery', 'nursery', 'lkg', 'ukg', 'kg', 'class_one', 'class_two', 'class_three', 'class_four', 'class_five', 'class_six', 'class_seven', 'class_eight', 'class_nine', 'class_ten', 'class_eleven', 'class_twelve'];
}
