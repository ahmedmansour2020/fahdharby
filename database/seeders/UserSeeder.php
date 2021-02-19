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
            'name' => 'Administrator',
            'email' => 'admin@fahd.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => '2021-01-02 16:00:56',
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'vendor',
            'email' => 'vendor@fahd.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => '2021-01-02 16:00:56',
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@fahd.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => '2021-01-02 16:00:56',
            'role_id' => 3,
        ]);

    }
}
