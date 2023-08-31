<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InquiryForm extends Model
{
    use HasFactory, BasicAudit, SoftDeletes, SnowflakeID, HistoryRecord;

    protected $fillable = ["travel_month", "travel_year", "stay_days", "budget", "adult_count", "child_count", "interest", "destinations", "f_name", "l_name", "email", "phone", "own_country", "accommodation", "how_u_know", "other_information", "special_note"];
}
