<?php

namespace Database\Seeders;

use App\Models\trabajador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        trabajador::factory(10)->create();
    }
}
