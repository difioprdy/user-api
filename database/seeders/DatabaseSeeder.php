<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Create 50 users
        User::factory(50)->create()->each(function ($user) {
            //Each user gets 1-5 posts
            $postsCount = rand(1, 5);
            Post::factory($postsCount)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
