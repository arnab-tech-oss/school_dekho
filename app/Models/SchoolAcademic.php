<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolAcademic extends Model
{
    use HasFactory;

    public $table = 'school_academics';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
