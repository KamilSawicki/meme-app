<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         \App\Models\User::factory(10)->create();
         \App\Models\Meme::factory(100)->create();
         \App\Models\Comment::factory(1)->create(); //One for replies availability
         \App\Models\Comment::factory(999)->create();
         \App\Models\Vote::factory(10000)->create();
    }
}
