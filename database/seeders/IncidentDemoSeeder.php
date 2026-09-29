<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class IncidentDemoSeeder extends Seeder
{
    public function run(): void
    {
        Asset::factory()->count(10)->create();
    }
}
