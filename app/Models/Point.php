<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['user_name', 'user_email', 'point'];
    use HasFactory;
}
