<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolMedium extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'school_mediums';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public function schools()
    {
        return $this->hasMany(School::class,"school_medium_id");
    }
}
