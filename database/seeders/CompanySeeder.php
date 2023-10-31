<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 5; $i++) {

            Company::factory()->state(["user_id" => $i])->create();
        }

    }
}
