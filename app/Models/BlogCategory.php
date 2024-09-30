<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'name',
        'is_active'
    ];

    protected $casts=[
        "is_active"=>"bool"
    ];
    
    public function blog_categories()
    {
        return $this->hasMany(BlogCategoryMap::class,'blog_category_id','id');
    }

    
}
