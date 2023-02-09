<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as faker;
use App\Models\Customer;
class CustomerSeeder extends Seeder
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
            $customer = new Customer;
            $customer->cust_name = $faker->name;
            $customer->cust_city = $faker->city;
            $customer->save();
        }
    }
}
