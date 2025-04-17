<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name','plan_validity','price','description','medium','state','description_1','description_2','description_3','description_4'
];
}
