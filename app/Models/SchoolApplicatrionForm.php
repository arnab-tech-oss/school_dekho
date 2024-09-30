<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolApplicatrionForm extends Model
{
    use HasFactory;
    protected $fillable=['school_id','fields'];
    public function fields():Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value)??[],
            set: fn ($value) => json_encode($value),
        );
    }
    
   public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

}
