<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'benefit_id',
        'enrolled_on',
    ];
}
