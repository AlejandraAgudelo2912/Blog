<?php

namespace Database\Seeders;

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
            ]);
        User::factory(5)->create();

        $users=User::all();

        $users->each(function($user){
            $user->posts()->saveMany(Post::factory(10)->make());//el save many ya accede a la base de datos por tanto aqui no necesitamos crear un create y el make lo hcae en memoria osea no toca la base de datos

        });
    }
}
