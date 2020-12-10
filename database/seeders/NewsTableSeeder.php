<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();
        $faker = \Faker\Factory::create();

        for($i=0; $i<10; $i++){
          News::create([
            'title' => $faker->sentence,
            'description' => $faker->sentence,
            'create_date' => $faker->date,
            'user' => $faker->name,
          ]);
        }
    }
}
