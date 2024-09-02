<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users to assign posts to them
        $users = User::all();

        // Create posts for each user
        foreach ($users as $user) {
            Post::factory()->count(5)->create(['user_id' => $user->id]);
        }
    }
}
