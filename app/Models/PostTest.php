<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_id',
        'product_name',
        'intention_to_buy',
        'manipulation_answers',
        'pt_q1', 'pt_q2', 'pt_q3', 'pt_q4', 'pt_q5',
        'pt_q6', 'pt_q7', 'pt_q8', 'pt_q9', 'pt_q10',
        'pt_q11', 'pt_q12', 'pt_q13', 'pt_q14', 'pt_q15',
        'pt_q16', 'pt_q17', 'pt_q18', 'pt_q19', 'pt_q20',
        'pt_q21', 'pt_q22', 'pt_q23', 'pt_q24', 'pt_q25',
        'pt_q26', 'pt_q27', 'pt_q28', 'pt_q29', 'pt_q30',
        'pt_q31', 'pt_q30', 'pt_q32', 'pt_q33', 'pt_q34', 'pt_q35',
        'pt_q36', 'pt_q37', 'pt_q38', 'pt_q39', 'pt_q40'
    ];
    
    protected $casts = [
        'manipulation_answers' => 'array',
    ];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
