<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'states';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $hidden = ['id','created_at','updated_at','deleted_at'];

    public function schools()
    {
        return $this->hasMany(SchoolContact::class,"state_id")->with(['school'=> function($q){
            $q->where('status',1);
        }]);
    }

}
