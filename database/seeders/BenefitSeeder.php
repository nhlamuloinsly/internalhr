<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Benefit;


class BenefitSeeder extends Seeder
{
    protected $model = Benefit::class;
    /**
Benefit::factory()->count(10)->create();
     * Run the database seeds.
     */
    public function run(): void
    {
        Benefit::factory()->count(5)->create();
    }
}
