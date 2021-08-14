<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement($array = ['Perros','Gatos','Europa','Latinoamerica','Autos','Barcos','Futbol','Beisbol','Robots']),
            'category_group_id'=>$this->faker->unique()->randomElement($array = ['1','2','3','4','5']),
        ];
    }
}
