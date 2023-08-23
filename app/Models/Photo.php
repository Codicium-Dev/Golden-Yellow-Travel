<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ["name", "url", "extension", "user_id", "size",];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
