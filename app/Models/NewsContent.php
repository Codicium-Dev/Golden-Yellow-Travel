<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsContent extends Model
{
    use HasFactory, BasicAudit, SoftDeletes;

    protected $fillable = ["news_id", "title", "content", "content_photo"];


    public function new()
    {
        return $this->belongsTo(News::class);
    }
    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
