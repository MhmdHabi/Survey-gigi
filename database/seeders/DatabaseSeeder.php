<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::create([
            'name' => 'Admin User',
            'age' => 30,
            'email' => 'admin@admin.com',
            'gender' => 'perempuan', // or 'perempuan'
            'role' => 'admin',
            'password' => bcrypt('12345678'), // Secure password
        ]);

        $this->call(CategorySeeder::class);
    }
}
