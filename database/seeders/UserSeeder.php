<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Oliver Andres Torres Rivero',
            'email'=>'olivertorres1997@gmail.com',
            'password'=>bcrypt('26269828'),
        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
