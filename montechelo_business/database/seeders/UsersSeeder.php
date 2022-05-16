<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'first_name' => 'César',
            'last_name' => 'Gómez',
            'phone' => '601235894',
            'identification' => '1152498753',
            'date_of_birth' => '1992-10-19',
            'email' => 'example@example.com',
        ];

        DB::table('users')->insert($data);
    }
}
