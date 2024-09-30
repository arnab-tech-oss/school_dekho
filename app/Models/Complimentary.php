<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complimentary extends Model
{
    use HasFactory;
    protected $fillable = [
        'month',
        'event_date',
        'event_title',
        'event_hash_tag'
    ];
    public function complimentary_image()
    {
        return $this->hasMany(ComplimentaryImage::class, 'complaintary_id', 'id');
    }
}
