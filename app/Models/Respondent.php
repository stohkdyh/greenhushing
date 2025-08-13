<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'country',
        'last_education',
    ];
}

