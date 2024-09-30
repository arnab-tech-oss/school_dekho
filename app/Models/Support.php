<?php

namespace App\Models;

use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    public function school_admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => FileHelper::GetFileUrl($value),
            set: fn ($value) => FileHelper::GetPathData($value)->file_name,
        );
    }
}
