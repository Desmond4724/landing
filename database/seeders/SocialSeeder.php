<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->insert([
            "title" => "phone",
            'icon' => "phone",
            'created_at' => now(),
            'updated_at'=> now()
        ]);
        DB::table('socials')->insert([
            "title" => "email",
            'icon' => "email",
            'created_at' => now(),
            'updated_at'=> now()
        ]);
        DB::table('socials')->insert([
            "title" => "telegram",
            'icon' => "telegram",
            'created_at' => now(),
            'updated_at'=> now()
        ]);
    }
}
