<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClaim extends Model
{
    use HasFactory;

    protected $table = "school_claims";

    protected $fillable = [
        'school_id',
        'verify',
        'name',
        'designation',
        'email',
        'phone'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, "school_id")->with('address');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, "school_claim_id");
    }
}
