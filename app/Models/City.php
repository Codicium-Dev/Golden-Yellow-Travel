<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, HistoryRecord;

    protected $fillable = ["name", "country_id", "city_photo"];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function tour()
    {
        return $this->hasMany(Tour::class);
    }


    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
