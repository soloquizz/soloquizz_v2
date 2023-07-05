<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrateurs')->insert([
            'matricule' => '202309L3P',
            'prenom' => 'Cheikh',
            'nom' => 'MBENGUE',
            'telephone' => '+221 770461100',
            'email_personnel' => 'cheikhmbengue146@gmail.com'
        ]);

        DB::table('users')->insert([
            'email' => 'cheikhmbengue146@gmail.com',
            'password' => bcrypt('Password0'),
            'personne_type' => 'Administrateur',
            'personne_id' => 1,
            'etat' => 1
        ]);

    }
}
