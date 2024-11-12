<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'role'=>'admin'
            ]);

        User::factory(5)->create();
        Category::factory(5)->create();

        $categories = Category::all();

        User::all()->each(function($user) use ($categories) {
            Post::factory(10)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);
        });

    }
}
