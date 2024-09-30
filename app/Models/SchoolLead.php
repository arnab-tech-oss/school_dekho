<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolLead extends Model
{
    use HasFactory;

    public $table = 'schools_leads';
    protected $fillable = ["lead_id"];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function application():Attribute {
        return Attribute::make(
            get: fn ($value) => json_decode($value)??[],
            set: fn ($value) => json_encode($value),
        );
    }
    public function school(){
        return $this->belongsTo(School::class, "school_id", "id");
    }
    public function lead_transfer()
    {
        return $this->belongsTo(AllLead::class, 'all_lead_id', 'id');
    }
    public function lead()
    {
      return $this->belongsTo(Lead::class,"lead_id");
    }
}
