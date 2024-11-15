<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Labschool Cirendeu',
            'email' => 'admincirendeu@gmail.com',
            'password' => bcrypt('@.cirendeu'),
            'remember_token' => Str::random(10),
        ]);
    }
}
