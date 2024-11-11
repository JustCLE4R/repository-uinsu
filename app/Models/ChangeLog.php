<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeLog extends Model
{
    use HasFactory;

    // protected $fillable = ['archive_id', 'change_type', 'user_id', 'change_date', 'change_details'];

    protected $guarded = ['id'];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    public function archive()
    {
        return $this->belongsTo(Archive::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
