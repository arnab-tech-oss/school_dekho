<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuery extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class,"school_id","id");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
