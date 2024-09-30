<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolNewApplication extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function studentlead()
    {
        return $this->hasMany(Lead::class, 'student_contact1', 'phone');
    }
}
