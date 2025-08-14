<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_id',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
    ];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
