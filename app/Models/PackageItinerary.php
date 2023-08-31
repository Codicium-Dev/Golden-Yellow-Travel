<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, HistoryRecord;

    protected $fillable = ["name", "package_tour_id", "description", "package_itinerary_photo"];

    public function packageTour()
    {
        return $this->belongsTo(PackageTour::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
