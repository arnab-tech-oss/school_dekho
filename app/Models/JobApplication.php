<?php

namespace App\Models;

use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_id', 'id');
    }

    public function resume():Attribute {
        return Attribute::make(
            get: fn ($value) => FileHelper::GetFileUrl($value),
            set: fn ($value) => FileHelper::GetPathData($value)->file_name,
        );
    }
}
