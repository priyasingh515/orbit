<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'year','weekly_file','state'
    ];
}
