<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeed extends Seeder
{
    
    public function run(): void
    {
       Berita::factory()->count(10)->create();
    }
}
