<?php

namespace Database\Factories;

use App\Models\Csv;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CsvFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Csv::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name,
          'email' => $this->faker->unique()->safeEmail,
          'formula' => $this->faker->formula,
          'systolicA' => $this->faker->systolicA,
          'systolicB' => $this->faker->systolicB,
          'diastolicA' => $this->faker->diastolicA,
          'diastolicB' => $this->faker->diastolicB,
          'remember_token' => Str::random(10),
        ];
    }
}
