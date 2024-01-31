<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            // 'fathers_name' => 'null',
            // 'mothers_name' => 'null',
            // 'place_of_birth' => 'null',
            // 'date_of_birth' => '1/1/1',
            // 'nationality' => 'null',
            // 'profassion' => 'null',
            // 'domicile' => 'null',
            // 'no_of_identity_or_passport' => 0,
            // 'date_of_identity_or_passport' => '1/1/1',
            // 'issued_of_identity_or_passport' => 'null',
            'phone_number' => 0,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'status' => '660',
        ]);

        User::create([
            'name' => 'chief',
            'last_name' => 'chief',
            // 'fathers_name' => 'null',
            // 'mothers_name' => 'null',
            // 'place_of_birth' => 'null',
            // 'date_of_birth' => '1/1/1',
            // 'nationality' => 'null',
            // 'profassion' => 'null',
            // 'domicile' => 'null',
            // 'no_of_identity_or_passport' => 0,
            // 'date_of_identity_or_passport' => '1/1/1',
            // 'issued_of_identity_or_passport' => 'null',
            'phone_number' => 0,
            'email' => 'chief@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => '1',
        ]);

        User::create([
            'name' => 'reception',
            'last_name' => 'reception',
            // 'fathers_name' => 'null',
            // 'mothers_name' => 'null',
            // 'place_of_birth' => 'null',
            // 'date_of_birth' => '1/1/1',
            // 'nationality' => 'null',
            // 'profassion' => 'null',
            // 'domicile' => 'null',
            // 'no_of_identity_or_passport' => 0,
            // 'date_of_identity_or_passport' => '1/1/1',
            // 'issued_of_identity_or_passport' => 'null',
            'phone_number' => 0,
            'email' => 'reception@gmail.com',
            'password' => Hash::make('00000000'),
            'status' => '2',
        ]);
    }
}
