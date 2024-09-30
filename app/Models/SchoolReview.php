<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolReview extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'school_reviews';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    
    public function school()
    {
        return $this->belongsTo(School::class,"school_id","id");
    }

}
