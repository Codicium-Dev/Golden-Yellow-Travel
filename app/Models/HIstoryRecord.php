<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryRecord extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, SoftDeletes;

    protected $fillable = [
        'action', 'action_by', 'target', 'payload', 'feature',
    ];

    protected $casts = [
        'payload' => 'json',
        'target' => 'json',
    ];
}
