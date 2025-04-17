<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otpsmodel extends Model
{
    
    use HasFactory;
    public $otps ='otpsmodels';
    protected $fillable = ['user_id', 'otp', 'is_active'];
}
