<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name_ar' => 'مسئول',
            'name_en' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name_ar' => 'تاجر',
            'name_en' => 'vendor',
        ]);
        DB::table('roles')->insert([
            'name_ar' => 'مستخدم',
            'name_en' => 'user',
        ]);

    }
}
