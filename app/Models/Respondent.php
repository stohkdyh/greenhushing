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
        'GPA',
        'work_experience',
        'last_education',
        'product_type',
        'time_completion',
        'final_product',
    ];
}

