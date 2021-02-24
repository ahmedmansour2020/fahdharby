<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name_ar' => 'ذكر',
            'name_en' => 'Male',
        ]);
        DB::table('genders')->insert([
            'name_ar' => 'أنثى',
            'name_en' => 'Female',
        ]);


    }
}
