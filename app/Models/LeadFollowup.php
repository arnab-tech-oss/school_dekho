<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadFollowup extends Model
{
    use HasFactory;

    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id', 'id');
    }

    public function lead()
    {
        return $this->belongsTo(AllLead::class, 'lead_id', 'id');
    }
}
