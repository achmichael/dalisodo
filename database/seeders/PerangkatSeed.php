<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perangkat;
class PerangkatSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perangkat::factory()->count(10)->create();
    }
}
