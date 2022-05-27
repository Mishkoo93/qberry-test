<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            LocationSeeder::class,
        ]);

        Booking::create([
            'user_id' => 1,
            'freeze_camera_id' => 1,
            'temperature' => -5,
            'reserved_blocks' => 0,
            'days' => 5,
            'access_code' => \Str::random(12)
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
