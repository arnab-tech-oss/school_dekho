<?php

namespace App\Models;

use App\Models\State;
use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolApplicationFormSettings;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'token',
        'name',
        'address',
        'city_id',
        'district_id',
        'state_id',
        'school_medium_id',
        'school_board_id',
        'view_count',
        'is_admission',
        'is_trending',
        'school_logo',
        'principal_pic',
        'slug',
        'principal_name',
        'principal_designation',
        'principal_desk',
        'category',
        'school_type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function state()
    {
        return $this->belongsTo(State::class, "state_id", "id");
    }
    public function district()
    {
        return $this->belongsTo(District::class, "district_id", "id");
    }
    public function medium()
    {
        return $this->belongsTo(SchoolMedium::class, "school_medium_id", "id");
    }
    public function address()
    {
        return $this->belongsTo(SchoolContact::class, "id", "school_id");
    }
    public function school_address()
    {
        return $this->hasMany(SchoolContact::class, "school_id", "id");
    }
    public function applicationform()
    {
        return $this->belongsTo(SchoolApplicationFormSettings::class, "id", "school_id");
    }
    public function categories()
    {
        return $this->belongsTo(SchoolCategory::class, "category", "id");
    }
    public function boards()
    {
        return $this->belongsTo(SchoolBoard::class, "board", "id");
    }
    public function elligibilities()
    {
        return $this->belongsTo(SchoolEligibility::class, "id", "school_id");
    }
    public function school_elligibilities()
    {
        return $this->hasMany(SchoolEligibility::class,  "school_id", "id");
    }
    public function fees()
    {
        return $this->belongsTo(SchoolFees::class, "id", "school_id");
    }
    public function seats()
    {
        return $this->belongsTo(SeatAvailability::class, "id", "school_id");
    }
    public function hours()
    {
        return $this->belongsTo(SchoolHour::class, "id", "school_id");
    }
    public function facilities()
    {
        return $this->belongsTo(SchoolFacility::class, "id", "school_id");
    }
    public function images()
    {
        return $this->belongsTo(SchoolImage::class, "id", "school_id");
    }
    public function reviews()
    {
        return $this->hasMany(SchoolReview::class, "school_id");
    }
    public function claims()
    {
        return $this->hasMany(SchoolClaim::class, "school_id");
    }
    public function contact()
    {
        return $this->hasOne(SchoolContact::class, "school_id");
    }
    protected function schoolLogo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => FileHelper::GetFileUrl($value, FileHelper::$logo_path),
            set: fn ($value) => FileHelper::GetPathData($value)->file_name,
        );
    }
    protected function principalPic(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => FileHelper::GetFileUrl($value, FileHelper::$principal),
            set: fn ($value) => FileHelper::GetPathData($value)->file_name,
        );
    }
    public function school_leads()
    {
        return $this->hasMany(SchoolLead::class, "school_id", "id");
    }
    public function school_bill_original()
    {
        return $this->hasMany(SchoolBillOriginal::class, "school_id", "id");
    }
     public function school_claim_counselor()
    {
        return $this->hasMany(SchoolClaim::class, "school_id", "id");
    }

}
