<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected  $table = 'users';

    protected $fillable = [
        'gender_id', 'name', 'email', 'age', 'married', 'birthdate', 'info', 
        'current_date', 'current_time',
    ];

    public $timestamps = false;
}
