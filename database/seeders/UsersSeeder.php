<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            // [
            //     'firstName' => 'Ngoma',
            //     'lastName' => 'Tec',
            //     'email' => 'ngomatec@gmail.com',
            //     'password' => bcrypt('Ngoma123')
            // ],
            [
               'firstName' => 'Rosa',
               'lastName' => 'Tec',
               'email' => 'rosa.tec@mtec.ao',
               'password' => bcrypt('Rosa123')
           ], 
        //    [
        //        'firstName' => 'Zany',
        //        'lastName' => 'Tec',
        //        'email' => 'zany.tec@mtec.ao',
        //        'password' => bcrypt('Zany123')
        //    ],

        );
    }
}
