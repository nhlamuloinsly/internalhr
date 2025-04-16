<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\User::factory(10)->create();
        $this->call([DepartmentSeeder::class, JobTitleSeeder::class, EmployeeProfileSeeder::class, CompensationSeeder::class, BenefitSeeder::class, BenefitEnrollmentSeeder::class, LeaveRequestSeeder::class, AttendanceSeeder::class, PerformanceReviewSeeder::class,]);
        $this->call([RoleAndAdminSeeder::class,]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([UserSeeder::class, DepartmentSeeder::class, JobTitleSeeder::class, EmployeeProfileSeeder::class, CompensationSeeder::class, BenefitSeeder::class, BenefitEnrollmentSeeder::class, LeaveRequestSeeder::class, AttendanceSeeder::class, PerformanceReviewSeeder::class,]);
    }
}
