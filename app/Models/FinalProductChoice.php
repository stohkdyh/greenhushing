<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProductChoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_id',
        'product_name'
    ];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
