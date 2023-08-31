<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packages extends Model
{
    use HasFactory, SnowflakeID, BasicAudit;

    protected $fillable = ["name", "country_id", "package_photo"];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function packageTour()
    {
        return $this->hasMany(PackageTour::class);
    }


    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
