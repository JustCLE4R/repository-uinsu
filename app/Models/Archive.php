<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archive extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function changeLogs()
    {
        return $this->hasMany(ChangeLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
