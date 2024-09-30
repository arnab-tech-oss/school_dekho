<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryMap extends Model
{
    use HasFactory;

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }



}
