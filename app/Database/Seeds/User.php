<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class User extends Seeder
{
    public function run()
    {
        //
        $faker = Factory::create('pt_BR');

        //Insere 20 dados na tabela users
        for($i = 1; $i <= 20; $i++){
            $data = [
                'nome' => $faker->firstName(),
                'email' => $faker->email(),
                'password' => password_hash('123', PASSWORD_DEFAULT)
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
