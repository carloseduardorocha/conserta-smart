<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin.consertasmart@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'Carlos Rocha',
            'email' => 'carlos.rocha.dev@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'Renato Piovesan',
            'email' => 'renatopiovesan22@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'Vagner Luiz',
            'email' => 'vagnerluiz@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'employee',
        ]);
    }
}
