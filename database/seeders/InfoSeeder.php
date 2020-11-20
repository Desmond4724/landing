<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            "title" => "title",
            "content" => "content",
            "image" => "image",
            "phone" => "998889",
            "email" => "admin@gmail.com",
            "address" => "Tashkent Uzbekistan",
            "lat" => 100,
            "lng" => 100,
            "telegram" => "https://tg.me/test"
        ]);
    }
}
