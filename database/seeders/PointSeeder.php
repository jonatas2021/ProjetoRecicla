<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Point::factory()->count(30)->create();
    }
}
