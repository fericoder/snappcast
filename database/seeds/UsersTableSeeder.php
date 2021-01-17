<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'علی',
            'family' => 'رحمانی',
            'fullName' => 'علی رحمانی',
            'phoneNumber' => '09201010328',
            'type' => 'admin',
            'lastLogin' => now(),
            'lastAction' => now(),
            'email' => 'rahmani@rieco.ir',
            'avatar' => '/img/avatar1.jpg',
            'password' => bcrypt('0212202'),
        ]);

    }
}
