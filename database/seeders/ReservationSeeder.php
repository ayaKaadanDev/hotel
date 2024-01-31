<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'date' => Carbon::parse('01/01/2023'),
            'room_id' => '1',
            'user_id' => '1',
        ]);
        Reservation::create([
            'date' => Carbon::parse('01/01/2023') ,
            'room_id' => '2',
            'user_id' => '3',
        ]);
    }
}
