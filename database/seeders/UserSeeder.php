<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // 
      for ($i = 1; $i <= 10; $i++) {                                   
   
   
             if($i == 1){
   
   
               User::factory()->state(['email' => 'adm@gmail.com'])->create();
   
   
             }else{
 
 
             User::factory()->state(['email' => 'teste'.$i.'@gmail.com'])->create();
 
 
 
           }
 
 
 
     }
        

    }
}
