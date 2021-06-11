<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom'=>'slama',
            'prenom'=>'salim',
            'adresse'=>'sahloul',
            'email'=>'medsalimslama@gmail.com',
            'password'=>'salim123'
        ]);
    }
}
