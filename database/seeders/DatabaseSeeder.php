<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryGroup;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /* CategoryGroup::factory(5)->create();
        Category::factory(5)->create(); */
        $this->call(CategoryGroupSeeder::class);
        $this->call(CategorySeeder::class);
        Article::factory(10)->create();
        Comment::factory(10)->create();
        $this->call(UserSeeder::class);
    }
}
