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
        $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
        $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','.');
        $lastName = $this->faker->lastName;
        $name = $this->faker->firstName .' '.$lastName;
        $parent_name = $this->faker->firstName .' '.$lastName;
        $mail = strtolower(str_replace($search,$replace,$parent_name)).'@devamtakip.com';

        return [
            'name' => $name,
            'parent_name' => $parent_name,
            'email' => $mail
        ];
    }
}
