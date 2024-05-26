<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_start_time',
        'work_end_time',
        'break_start_time',
        'break_end_time',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}