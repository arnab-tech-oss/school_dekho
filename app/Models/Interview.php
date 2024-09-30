<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_details_id',
        'vision',
        'prepare_students',
        'difference',
        'balance_learning',
        'teaching_methods',
        'improve_skills',
        'friendly_school',
        'involve_parents',
        'facilities',
        'technology',
    ];
    protected $guarded = [
        'id'
    ];
}
