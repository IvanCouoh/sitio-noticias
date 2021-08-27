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
            'image'=>$this->faker->randomElement($array=['https://s.france24.com/media/display/688585be-9060-11ea-8c8d-005056a98db9/w:1400/p:16x9/journal-1920x1080_es.webp']),
            'category_id'=>$this->faker->randomElement($array = ['1','2','3','4','5']),
            'published_at'=>$this->faker->dateTime($max ='now', $timezone = null),
        ];
    }
}
