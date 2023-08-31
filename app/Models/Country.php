<?php

namespace App\Models;

use App\Traits\BasicAudit;
use App\Traits\HistoryRecord;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, HistoryRecord;

    protected $fillable = ["name", "country_photo"];

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function packages()
    {
        return $this->hasMany(Packages::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
