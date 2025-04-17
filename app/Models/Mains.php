<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mains extends Model
{
    use HasFactory;
    protected $fillable = [
            'paper_type','subject_type','mains_file','state'
    ];
}
