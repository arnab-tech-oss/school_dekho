<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student_query extends Model
{
    use HasFactory;

    protected $table = "student_queries";

    /**
     * The schools that belong to the Student_query
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function schools()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function profile()
    {
        return $this->belongsTo(Student_profile::class,'user_id', 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class,'school_id', 'id');
    }
}
