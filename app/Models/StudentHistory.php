<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHistory extends Model
{
    use HasFactory;

    protected $table = "student_histories";

    public function schools()
    {
        return $this->belongsTo(School::class,'school_id','id');
    }

    public function schooldetails()
    {
        return $this->belongsTo(SchoolContact::class,'school_id','school_id');
    }
}
