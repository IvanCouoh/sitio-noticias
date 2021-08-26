<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_group = CategoryGroup::where('name', 'Noticias')->first();
        $article_categories = ['Deportes', 'Viajes', 'Tecnología', 'Animales', 'Transportes', 'Salud', 'Internacional'];
        foreach($article_categories as $category){
            Category::create([
                'name' => $category,
                'category_group_id' => $article_group->id,
            ]);
        }

        $comment_group = CategoryGroup::where('name', 'Comentarios')->first();
        $comment_categories = ['Bueno', 'Spam', 'Duplicado', 'Grosero'];
        foreach($comment_categories as $category){
            Category::create([
                'name' => $category,
                'category_group_id' => $comment_group->id,
            ]);
        }

        $blog_group = CategoryGroup::where('name', 'Blog')->first();
        $blog_categories = ['Emprendimiento', 'Superacion personal', 'Programación'];
        foreach($blog_categories as $category){
            Category::create([
                'name' => $category,
                'category_group_id' => $blog_group->id,
            ]);
        }
    }
}
