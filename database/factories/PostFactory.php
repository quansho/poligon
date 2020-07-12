<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\BlogPost::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'location_id'=> 1,
        'user_id' => 1,
        'title' => $faker->sentence,
        'slug'=> $faker->sentence,
        'content_raw' => $faker->paragraphs(rand(3, 10), true),
        'content_html' => $faker->paragraphs(rand(3, 10), true),
        'is_published' => $faker->boolean,
    ];
});
