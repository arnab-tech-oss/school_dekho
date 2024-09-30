<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{
    use HasFactory;
    protected $fillable = ['is_subscribe'];
    public function cities()
    {
        return $this->belongsTo(City::class,"city","id");
    }
    public function states()
    {
        return $this->belongsTo(State::class,"state_id","id");
    }
    public function districts()
    {
        return $this->belongsTo(District::class,"district_id","id");
    }
    public function school()
    {
        return $this->belongsTo(School::class,"school_id","id");
    }
}
