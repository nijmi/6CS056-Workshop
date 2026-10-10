<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'course',
        'phone',
        'address',
        'date_of_birth',
    ];
}
