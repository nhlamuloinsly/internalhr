<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerformanceReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'review_date',
        'score',
        'comments',
    ];
}
