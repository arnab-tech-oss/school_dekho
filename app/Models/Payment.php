<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=["status","validated_at"];

    public function claim()
    {
        return $this->belongsTo(SchoolClaim::class,"school_claim_id");
    }
        public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
