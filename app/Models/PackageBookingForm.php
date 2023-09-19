<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageBookingForm extends Model
{
    use HasFactory, BasicAudit, SoftDeletes, SnowflakeID;

    protected $fillable = ["package_tour_id", "adult", "child", "infants", "date", "arrival_airport", "tour_type", "accommodation", "special_req", "gender", "full_name", "email", "phone", "country", "city", "social_media"];

    public function packageTour()
    {
        return $this->belongsTo(PackageTour::class);
    }
}
