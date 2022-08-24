<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Repositories\RoomTypeRepository;
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
        $this->call(RoomTypeTableSeeder::class);

        $rooms = app(RoomTypeRepository::class)->get();

        Room::factory()
            ->count(3)
            ->for($rooms->first())
            ->create();

        Room::factory()
            ->count(3)
            ->for($rooms->last())
            ->create();



    }
}
