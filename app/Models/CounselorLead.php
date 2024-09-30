<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselorLead extends Model
{
    use HasFactory;
    protected $fillable = ["status"];
    public function lead()
    {
        return $this->belongsTo(AllLead::class, 'lead_id', 'id');
    }

    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id', 'id');
    }
}
