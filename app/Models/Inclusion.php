<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    use HasFactory, SnowflakeID, BasicAudit;

    protected $fillable = ["tour_id", "meals", "transport", "accommodation", "included_activities"];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
