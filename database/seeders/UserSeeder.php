<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'ADMIN',
            'email' => env("DEFAULT_EMAIL"),
            'password' => env("DEFAULT_PASSWORD"),
            'role_id' => 1
        ]);


    }
}
