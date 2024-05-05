<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create(['email'=> 'a@a.com', 'isAdmin' => true]);
        \App\Models\User::factory(1)->create(['email'=> 'test@test.com']);
        \App\Models\User::factory(5)->create();
/*        \App\Models\Course::factory(4)->create();
        \App\Models\Coursedate::factory(10)->create();
        \App\Models\Booking::factory(5)->create();*/

    }
}
