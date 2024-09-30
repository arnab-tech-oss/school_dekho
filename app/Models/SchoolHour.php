<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
class SchoolHour extends Model
{
    use HasFactory;
    protected $fillable = ['sun', 'mon', 'wed', 'tue', 'thu', 'fri', 'sat'];
    public static function getTime($time)
    {
        $dateString = date("Y-m-d") . " " . $time;
        $dateObject = new DateTime($dateString);
        return $dateObject->format('h:i A');
    }
    public function mon(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function tue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function wed(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function thu(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function fri(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function sat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
    public function sun(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }
}
