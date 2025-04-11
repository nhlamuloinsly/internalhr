<?php

namespace Database\Factories;

use App\Models\Compensation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compensation>
 */
class CompensationFactory extends Factory
{
    protected $model = Compensation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'amount' => $this->faker->numberBetween(40000, 150000),
            'currency' => 'USD',
            'pay_date' => $this->faker->date(),
        ];
    }
}
