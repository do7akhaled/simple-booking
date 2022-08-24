<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'standard',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'title' => 'suite',
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ];

        DB::table('room_types')->insert($data);
    }
}
