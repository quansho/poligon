<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['id' => 1, 'title' => 'Sights and cultural objects', 'slug' => 'sights-cultural',  'description' => 'Nothing', 'parent_id' => 0],
            ['id' => 2, 'title' => 'Museums', 'slug' => 'museums',  'description' => 'Nothing', 'parent_id' => 0],
            ['id' => 3, 'title' => 'Fun and games', 'slug' => 'fun-games',  'description' => 'Nothing', 'parent_id' => 0],
            ['id' => 4, 'title' => 'Spa and Wellness', 'slug' => 'spa-wellness',  'description' => 'Nothing', 'parent_id' => 0],
            ['id' => 5, 'title' => 'Church', 'slug' => 'church',  'description' => 'Nothing', 'parent_id' => 1],

        ];

        \App\Models\BlogPostCategory::insert($category);

    }
}
