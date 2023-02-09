<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\PersonSeeder;
use Database\Seeders\PhoneSeeder;
use Database\Seeders\CreatorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // OrderSeeder::class,
            // CustomerSeeder::class,
            // PersonSeeder::class,
            // PhoneSeeder::class,
            CreatorSeeder::class

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
