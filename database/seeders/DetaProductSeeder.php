<?php

namespace Database\Seeders;

use App\Models\deta_product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetaProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        deta_product::factory(10)->create();
    }
}
