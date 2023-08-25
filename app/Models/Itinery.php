<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinery extends Model
{
    use HasFactory, SnowflakeID, BasicAudit;

    protected $fillable = ["name", "tour_id", "description", "meal", "accommodation", "note", "itinerary_photo"];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
