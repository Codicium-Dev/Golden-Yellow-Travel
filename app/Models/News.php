<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, BasicAudit, SoftDeletes;

    protected $fillable = ["user_id", "title", "title_photo", "description"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function newsContent()
    {
        return $this->hasMany(NewsContent::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
