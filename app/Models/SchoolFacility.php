<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFacility extends Model
{
    use HasFactory;
    public $table = 'school_facilities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
