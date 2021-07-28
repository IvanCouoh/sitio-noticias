<?php

namespace Database\Factories;

use App\Models\category_group;
use Illuminate\Database\Eloquent\Factories\Factory;

class category_groupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = category_group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->randomElement($array = ['Blog','Deportes','Entretenimiento','Espectaculos','Tecnología']),
        ];
    }
}
