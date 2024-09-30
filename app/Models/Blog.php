<?php

namespace App\Models;

use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'image',
        'meta_keywords',
        'meta_description',
        'view_count',
        'blog_description',
        'is_active'
    ];

    protected $casts=[
        "is_active"=>"bool"
    ];

    
    
    public function image():Attribute {
        return Attribute::make(
            get: fn ($value) => FileHelper::GetFileUrl($value),
            set: fn ($value) => FileHelper::GetPathData($value)->file_name,
        );
    }

    public function blog_category_maps()
    {
        return $this->hasMany(BlogCategoryMap::class,'blog_id')->with('blog_category');
    }

    public function blog_tag_maps()
    {
        return $this->hasMany(BlogTagMap::class,'blog_id')->with('blog_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment()
    {
        return $this->hasMany(BlogComment::class,'blog_id');
    }
}
