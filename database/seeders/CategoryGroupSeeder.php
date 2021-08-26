<?php

namespace Database\Seeders;

use App\Models\CategoryGroup;
use Illuminate\Database\Seeder;

class CategoryGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryGroup::create([
            'name' => 'Noticias',
        ]);
        CategoryGroup::create([
            'name' => 'Comentarios',
        ]);
        CategoryGroup::create([
            'name' => 'Blog',
        ]);
    }
}
