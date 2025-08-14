<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_id',
        'product_name',
        'rating',
    ];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
