<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach (range(1, 500) as $index) {
            Post::insert([
                'title' => $faker->title,
                'description' => $faker->text,
                'user_id' => rand(1, 3)
            ]);
        }
    }
}