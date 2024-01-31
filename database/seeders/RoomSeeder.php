<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'number' => '0',
            'floor' => '0',
            'beds_number' => '0',
            'status' => 'busy',
        ]);
        Room::create([
            'number' => '10',
            'floor' => '0',
            'beds_number' => '0',
            'status' => 'busy',
        ]);
    }
}
