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
            'value' => "phone"
        ]);
        DB::table('socials')->insert([
            "title" => "email",
            'value' => "email"
        ]);
        DB::table('socials')->insert([
            "title" => "telegram",
            'value' => "telegram"
        ]);
    }
}
