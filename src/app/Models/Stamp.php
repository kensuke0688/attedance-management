<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    protected $fillable = [
        'user_id',
        'workday',
        'work_start_clicked',
        'work_end_clicked',
        'break_start_clicked',
        'break_end_clicked',
    ];
}
