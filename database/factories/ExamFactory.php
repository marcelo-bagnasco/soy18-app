<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ExamFactory extends Factory
{
    protected $model = Exam::class;
    protected $connection = "mysql_second";

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'exam_date' => $this->faker->date(),
        ];
    }
}
