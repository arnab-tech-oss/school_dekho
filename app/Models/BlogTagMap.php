<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTagMap extends Model
{
    use HasFactory;

    public function blog_tag()
    {
        return $this->belongsTo(BlogTag::class,'blog_tag_id');
    }
}
