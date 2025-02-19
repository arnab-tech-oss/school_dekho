<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolTrending extends Model
{
    use HasFactory;
    protected $fillable=['id'];
    
    public function schoolIds():Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value)??[],
            set: fn ($value) => json_encode($value),
        );
    }
}
