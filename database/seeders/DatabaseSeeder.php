<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' => 'admin']);
        \App\Models\User::factory(1)->create();
        $this->call([
            InfoSeeder::class,
            SocialSeeder::class
        ]);
    }
}
