<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class FrontCounsellorQuery extends Model
{
    use HasFactory;
    
    protected $table = 'front_counsellor_query';
    
    protected $guarded = [];
    
    public function stateDetails(){
        return $this->belongsTo(State::class, 'state', 'id');
    }
}
