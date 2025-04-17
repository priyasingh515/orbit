<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleEvaluation extends Model
{

    use HasFactory;
    protected $table = 'sample_evalutions';
    protected $fillable = [
        'name','sample_file'
];
}
