<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // create user
         // Crear usuarios con cada rol
        $users = [
            [
                'name' => 'Admin Principal',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Básico',
                'email' => 'admin.basico@example.com',
                'password' => Hash::make('password'),
                'role' => 'adminBasico',
            ],
            [
                'name' => 'Admin Premium',
                'email' => 'admin.premium@example.com',
                'password' => Hash::make('password'),
                'role' => 'adminPremium',
            ],
            [
                'name' => 'Estudiante',
                'email' => 'estudiante@example.com',
                'password' => Hash::make('password'),
                'role' => 'estudiante',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']], 
                ['name' => $userData['name'], 'password' => $userData['password']]
            );
            $user->assignRole($userData['role']);
        }
        
    }
}
