<?php

namespace Database\Factories;

use App\Models\Weight_log;
use Illuminate\Database\Eloquent\Factories\Factory;

class Weight_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'weight' => $this->faker->numberBetween(4000,10000) / 100,
            'calories' => $this->faker->numberBetween(0, 3000),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
/* ファクトリについて学ぼう確認。モデルについても合わせてやる */