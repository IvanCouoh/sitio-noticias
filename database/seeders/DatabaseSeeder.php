<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\category_group;
use App\Models\Categories;
use App\Models\News;
use App\Models\Comentaries;



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
        category_group::factory(5)->create();
        Categories::factory(5)->create();
        News::factory(10)->create();
        Comentaries::factory(10)->create();
    }
}
