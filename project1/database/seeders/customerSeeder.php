<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;
use faker\Factory as faker;
class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        

        for ($i=0; $i <12 ; $i++) {
            $customer = new customer;
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->phone = $faker->unique()->numerify('91##########');
            $customer->city = $faker->city;
            $customer->dob  = $faker->date;
            $customer->password= $faker->password;
            $customer->save();
        }

    }
}
