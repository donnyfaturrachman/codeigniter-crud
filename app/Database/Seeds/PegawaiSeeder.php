<?php namespace App\Database\Seeds;
use Faker\Factory as Faker;
class PegawaiSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
            $faker = Faker::create('id_ID');

            for($i=1; $i <= 100; $i++){
                $this->db->table('pegawai')->insert([
                    'name' => $faker->name,
                    'nip' => $faker->name,
                    'email' => $faker->email,
                    'gender' => 1,
                    'hobby' => 1,
                    'path' => 2
                ]);
            }

        }
}