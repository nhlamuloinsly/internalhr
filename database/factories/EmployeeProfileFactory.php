<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmployeeProfile;
use App\Models\User;
use App\Models\Department;
use App\Models\JobTitle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeProfile>
 */
class EmployeeProfileFactory extends Factory
{
    protected $model = EmployeeProfile::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
            'job_title_id' => JobTitle::inRandomOrder()->first()->id,
            'hire_date' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'photo' => null,
        ];
    }
}
