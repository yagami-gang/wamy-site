<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Informaticien;
use App\Models\User;
use App\Models\TypeUser;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //creation des types
        Type::create([
            'role' => 'admin',
        ]);
        Type::create([
            'role' => 'user',
        ]);
        Type::create([
            'role' => 'informaticien',
        ]);

        //creation des user
        User::create([
            'name' => 'admin',
            'password' => bcrypt('11111111'),
            'email' => 'tes@gmail.com',
        ]);
        User::create([
            'name' => 'Informaticien',
            'password' => bcrypt('11111111'),
            'email' => 'tesI@gmail.com',
        ]);
        User::create([
            'name' => 'user',
            'password' => bcrypt('11111111'),
            'email' => 'tesU@gmail.com',
        ]);

        // creation d'informaticien
        Informaticien::create([
            'id_user' => 2
        ]);
        
        // creation des types d'utilisateur

        TypeUser::create([
            'id_user' => 1,
            'id_type' => 1
        ]);
        TypeUser::create([
            'id_user' => 2,
            'id_type' => 3
        ]);
        TypeUser::create([
            'id_user' => 3,
            'id_type' => 2
        ]);
    }
    
}
