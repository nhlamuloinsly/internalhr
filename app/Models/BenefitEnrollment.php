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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
    
}
