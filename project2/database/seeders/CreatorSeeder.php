<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Creator;
use GuzzleHttp\Promise\Create;

class CreatorSeeder extends Seeder
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
            $creator = new Creator;
            $creator->name = $faker->firstNameMale();
            $creator->order_id = 1;
            $creator->save();
        }
    }
}
