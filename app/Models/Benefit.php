<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'provider',
    ];
    public function enrollments()
    {
        return $this->hasMany(BenefitEnrollment::class);
    }

}
