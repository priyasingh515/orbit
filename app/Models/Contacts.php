<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'enqueries';
    protected $fillable = [
            'name','email','mobile','subject','message','state'
    ];
}
