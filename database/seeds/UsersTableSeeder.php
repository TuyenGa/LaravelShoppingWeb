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
            'name' => "phuong",
            'email' => 'admin@localhost.com',
            'password' => Hash::make("123"),
            'phone'  => "0748963604",
            "username" => "phuong",
            "role_id" => 1
        ]);
    }
}
