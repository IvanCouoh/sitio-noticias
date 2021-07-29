<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->text(50),
            'author'=>$this->faker->name(),
            'category_id'=>$this->faker->randomElement($array = ['1','2','3','4','5']),
            'published_at'=>$this->faker->dateTime($max ='now', $timezone = null),
        ];
    }
}
