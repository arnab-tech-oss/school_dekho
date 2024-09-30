<?php

namespace App\Models;

use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
class SchoolImage extends Model
{
    use HasFactory;
    public $table = 'school_images';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = ['id', 'school_image'];
    protected function schoolImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->bindSchoolImagePath($value),
            set: fn ($value) => $this->setSchoolImagePath($value),
        );
    }
    private function bindSchoolImagePath($value)
    {
        $image_paths = json_decode($value) ?? [];
        $images = [];
        foreach ($image_paths as $path) {
            $url = FileHelper::GetFileUrl($path, FileHelper::$gallery);
            array_push($images, $url);
        }
        return $images;
    }
    private function setSchoolImagePath($urls)
    {
        if (!$urls) {
            return null;
        }
        $temp_list = [];
        foreach ($urls as $url) {
            $file_name = FileHelper::GetPathData($url)->file_name;
            array_push($temp_list, $file_name);
        }
        return json_encode($temp_list);
    }
}
