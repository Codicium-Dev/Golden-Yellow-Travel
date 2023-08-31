<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, HistoryRecord;

    protected $fillable = ["name", "city_id", "start_date", "end_date", "overview", "price", "sale_price", "location", "departure", "theme", "duration", "rating", "type", "for_whom", 'style', "tour_photo"];

    protected $casts = [
        'tour_photo' => 'array',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function itinerary()
    {
        return $this->hasMany(Itinery::class);
    }

    public function inclusion()
    {
        return $this->hasMany(Inclusion::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
