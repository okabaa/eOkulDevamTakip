<?php

namespace Database\Factories;

use App\Models\Ogrenci;
use Illuminate\Database\Eloquent\Factories\Factory;

class OgrenciFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ogrenci::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'parent_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
