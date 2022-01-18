<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        //setting faker untuk data dari indonesia
        $faker = \Faker\Factory::create('id_ID');
        //buat 10 data
        for ($i = 0; $i < 10; $i++) {
            $data = [
                //generate username
                'division' => $faker->randomElement(['Admin', 'Employe']),
                //generate alamat
                'is_aktif' => $faker->randomElement(['no', 'yes'])
            ];
            //memasukan data ke database
            $this->db->table('divisions')->insert($data);
        }
    }
}
