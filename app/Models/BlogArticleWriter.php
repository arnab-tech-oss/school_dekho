<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticleWriter extends Model
{
    use HasFactory;

    protected $fillable = ["writer_description", "slug", "writer_name", "writer_about", "social_media"];
}
