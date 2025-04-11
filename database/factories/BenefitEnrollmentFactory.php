<?php

namespace Database\Factories;

use App\Models\BenefitEnrollment;
use App\Models\User;
use App\Models\Benefit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BenefitEnrollment>
 */
class BenefitEnrollmentFactory extends Factory
{
    protected $model = BenefitEnrollment::class;

/**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'benefit_id' => Benefit::inRandomOrder()->first()->id,
            'enrolled_on' => $this->faker->date(),
        ];
    }
}
