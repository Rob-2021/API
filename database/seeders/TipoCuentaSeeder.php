<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoCuenta;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCuenta::factory(30)->create();
    }
}
