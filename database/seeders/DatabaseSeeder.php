<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\Users;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Roles::create([
            'role_name' => 'editor'
        ]);

        Roles::create([
            'role_name' => 'admin'
        ]);

        Users::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        
        Users::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        
    }
}
