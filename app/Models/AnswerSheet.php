<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerSheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id','answer_pdf','status','question_no','paper_type_id'
    ];
}
