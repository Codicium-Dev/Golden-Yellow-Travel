<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, HistoryRecord;

    protected $fillable = ["tour_id", "start_date", "end_date", "category", "price", "sale_price", "private_price", "sale_private_price"];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
