<?php

namespace Database\Factories;

use App\Models\Sinif;
use Illuminate\Database\Eloquent\Factories\Factory;

class SinifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sinif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->regexify('([1-9]{1}|1[0-2]{1})\/[A-F]{1} Sınıfı'),
            'description' => $this->faker->text(50)
        ];
    }
}
