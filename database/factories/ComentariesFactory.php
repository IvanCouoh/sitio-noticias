<?php

namespace Database\Factories;

use App\Models\Comentaries;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentariesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentaries::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'message'=>$this->faker->text(25),
            'news_id'=>$this->faker->randomElement($array = ['1','2','3','4','5','6','7','8','9','10']),
        ];
    }
}
