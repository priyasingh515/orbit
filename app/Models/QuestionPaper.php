<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_type','pdf_path','state','subject_type','part'

    ];
}
