<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    public $table = 'student_leads';
    protected $fillable = ['admission'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function application():Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value)??[],
            set: fn ($value) => json_encode($value),
        );
    }

    public function school_leads()
    {
        return $this->hasMany(SchoolLead::class,"lead_id");
    }
    
    public function school_claims()
    {
        return $this->hasMany(SchoolClaim::class,"school_id","school_id");
    }
    
     public function admitted_school()
    {
        return $this->hasMany(School::class, "id", "school_id");
    }

}
