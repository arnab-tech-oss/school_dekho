<?php

namespace App\Models;

use App\Models\User;
use App\Models\CounselorLead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllLead extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "location",
        "pincode",
        "email",
        "board",
        "phone",
        "parent_name",
        "admission_for",
        "remarks",
        "status",
        "lead_source",
        "transfer_status",
    ];

    public function counselor_lead()
    {
        return $this->hasMany(CounselorLead::class, 'lead_id', 'id')->where('is_active', 1);
    }
    
    public function transfer_lead()
    {
        return $this->hasMany(SchoolLead::class, 'all_lead_id', 'id');
    }
}
