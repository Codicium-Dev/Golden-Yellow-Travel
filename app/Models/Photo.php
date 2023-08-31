<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes, HistoryRecord, BasicAudit;

    protected $fillable = ["name", "url", "extension", "user_id", "size",];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
