<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as faker;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1;$i<=10;$i++){
            $phone = new Phone;
            $phone->phone_name = $faker->name;
            $phone->person_id = $faker->numberBetween(1, 10);
            $phone->save();
        }

    }
}
