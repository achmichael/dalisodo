<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Potensi;

class PotensiSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Potensi::factory()->count(10)->create();
    }
}
