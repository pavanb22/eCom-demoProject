<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
        [
            'name' => 'Pavan Bhat',
            'email' => 'pavanbhat2015@gmail.com',
            'password' => Hash::make('1234')
        ],
        [
            'name' => 'Rohit Patil',
            'email' => 'rohit@gmail.com',
            'password' => Hash::make('1234')
        ],
        [
            'name' => 'Rohan Patil',
            'email' => 'rohan@gmail.com',
            'password' => Hash::make('1234')
        ],
        [
            'name' => 'Ajay Mahajan',
            'email' => 'ajay@gmail.com',
            'password' => Hash::make('1234')
        ],
        [
            'name' => 'Jay Patil',
            'email' => 'jay@gmail.com',
            'password' => Hash::make('1234')
        ]
        ]);
    }
}
