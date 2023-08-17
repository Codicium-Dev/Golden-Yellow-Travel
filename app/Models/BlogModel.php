<?php

namespace App\Models;

use App\Traits\BasicAudit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SnowflakeID;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogModel extends Model
{
    use HasFactory, SnowflakeID, BasicAudit, SoftDeletes;

    public $table = "blogs";

    protected $fillable = [
        "title", "description"
    ];
}
