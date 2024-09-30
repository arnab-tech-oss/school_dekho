<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'image',
    'email',
    'number',
    'address',
    'pincode',
    'school_name',
    'designation',
    'experience',
    ];
    protected $guarded = [
        'id'
    ];

    public function interview()
    {
        return $this->hasOne(Interview::class,'personal_details_id','id');
    }
}
