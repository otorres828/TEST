<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::makeDirectory('/public/post');
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(8)->create();
        $this->call(PostSeeder::class);
        Comment::factory(200)->create();

        
    }
}
