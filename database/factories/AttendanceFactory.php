<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-2 months', 'now');
        $checkIn = clone $date;
        $checkOut = (clone $checkIn)->modify('+8 hours');
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $date->format('Y-m-d'),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
        ];
    }
}
