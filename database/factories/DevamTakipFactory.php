<?php

namespace Database\Factories;

use App\Models\DevamTakip;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevamTakipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DevamTakip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name.' Dersi',
            'date' => $this->faker->dateTimeThisMonth,
            'hour' => rand(1,10)
        ];
    }
}
