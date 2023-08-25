<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTour extends Model
{
    use HasFactory, SnowflakeID, BasicAudit;

    protected $fillable = ["name", "package_id", "date", "overview", "price", "sale_price", "location", "departure", "theme", "duration", "rating", "type", "for_whom", 'style', "package_tour_photo"];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function package()
    {
        return $this->belongsTo(Packages::class);
    }


    public function packageItinerary()
    {
        return $this->hasMany(PackageItinerary::class);
    }

    public function packageInclusion()
    {
        return $this->hasMany(PackageInclusion::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
