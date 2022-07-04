<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        User::Create([
            'name' => 'carlos montellano',
            'email' => 'carlosmontellano@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('123'), 
            'rol' => 'admin',
            'remember_token' => Str::random(10)
        ]);
    }
}
