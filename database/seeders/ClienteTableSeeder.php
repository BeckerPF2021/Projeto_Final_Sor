<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class ClienteTableSeeder extends Seeder
{
    /**
     * php artisan db:seed --class=ClienteTableSeeder
     */

    
     public function run()
     {
         $faker = Faker::create();
 
         foreach (range(1, 10) as $index) {
             $cpf = $this->generateCPF();
 
             DB::table('cliente')->insert([
                 'endereco' => $faker->streetAddress,
                 'nome' => $faker->name,
                 'cpf' => $cpf,
                 'telefone' => $faker->phoneNumber,
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
         }
     }
 
     /**
      * Gerar numeros cpf aleatórios.
      *
      * @return string
      */
     private function generateCPF()
     {
         $n1 = mt_rand(0, 9);
         $n2 = mt_rand(0, 9);
         $n3 = mt_rand(0, 9);
         $n4 = mt_rand(0, 9);
         $n5 = mt_rand(0, 9);
         $n6 = mt_rand(0, 9);
         $n7 = mt_rand(0, 9);
         $n8 = mt_rand(0, 9);
         $n9 = mt_rand(0, 9);
         $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
         $d1 = 11 - ($d1 % 11);
         if ($d1 >= 10) {
             $d1 = 0;
         }
         $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
         $d2 = 11 - ($d2 % 11);
         if ($d2 >= 10) {
             $d2 = 0;
         }
 
         return '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
     }
}
