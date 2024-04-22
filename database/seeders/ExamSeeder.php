<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exams = Exam::factory()->count(10)->create();
    }
}
