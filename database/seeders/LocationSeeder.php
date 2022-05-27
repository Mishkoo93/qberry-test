<?php

namespace Database\Seeders;

use App\Models\FreezeCamera;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations[] = Location::create(['name' => 'Уилмингтон (Северная Каролина)', 'timezone' => 'America/New_York']);
        $locations[] = Location::create(['name' => 'Портленд (Орегон)', 'timezone' => 'America/Los_Angeles']);
        $locations[] = Location::create(['name' => 'Торонто', 'timezone' => 'America/Toronto']);
        $locations[] = Location::create(['name' => 'Варшава', 'timezone' => 'Europe/Warsaw']);
        $locations[] = Location::create(['name' => 'Валенсия', 'timezone' => 'Europe/Madrid']);
        $locations[] = Location::create(['name' => 'Шанхай', 'timezone' => 'Asia/Shanghai']);

        foreach ($locations as $location) {
            $freezeCameras = FreezeCamera::factory()
                ->count(rand(1, 15))
                ->for($location)
                ->create();

            // заполним сразу свободные блоки
            $freeBlocks = Location::withSum('freeze_cameras','free_blocks')->find($location->id)->freeze_cameras_sum_free_blocks;
            $location->update(['free_blocks' => $freeBlocks]);
        }

    }
}
