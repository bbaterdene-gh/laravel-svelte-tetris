<?php

namespace Database\Seeders;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Contact::truncate();
        $faker = \Faker\Factory::create();

        for($i=0; $i<5; $i++){
          Contact::create([
            'fname' => $faker->firstName,
            'lname' => $faker->lastName,
            'register' => $faker->creditCardNumber,
            'desc' => $faker->sentence,
          ]);
        }
    }
}
