<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCategory extends Model
{
    use HasFactory;

    public $table = 'school_categories';

    public function schools()
    {
        return $this->hasMany(School::class, 'id','category' );
    }
}
