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
         \App\Models\User::factory(200)->create();
         \App\Models\Job::factory(10)->create();
         \App\Models\Comment::factory(100)->create();
         \App\Models\Event::factory(10)->create();
         \App\Models\EventUser::factory(1000)->create();

         
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@softui.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
