<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

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
         //Cliente::factory(20)->create();
        $this->call([
        ClienteSeeder::class,
        TipoCuentaSeeder::class,
        UserSeeder::class
        ]);
    }
}
