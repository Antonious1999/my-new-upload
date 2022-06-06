<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            array(
                'name'=>'admin',
                'email'=>'admin@amit.com',
                'password'=>Hash::make('admin'),
            ),
            array(
                'name'=>'moderator',
                'emial'=>'moderator@amit.com',
                'password'=>Hash::make('moderator'),
            ),
            array(
                'name'=>'user',
                'emial'=>'user@amit.com',
                'password'=>Hash::make('user'),
            ),
        ]);
    }
}
