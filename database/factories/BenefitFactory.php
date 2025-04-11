<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Benefit;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefit>
 */
class BenefitFactory extends Factory
{
    protected $model = Benefit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Health Insurance', 'Dental', 'Vision', '401k', 'Life Insurance']),
            'description' => $this->faker->sentence,
            'provider' => $this->faker->company,
        ];
    }
}
