<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Crear roles
         $admin = Role::create(['name' => 'admin']);
         $adminPremium = Role::create(['name' => 'adminPremium']);
         $adminBasico = Role::create(['name' => 'adminBasico']);        
         $estudiante = Role::create(['name' => 'estudiante']);
        
         // Crear permisos
         Permission::create(['name' => 'crear-usuarios']);
         Permission::create(['name' => 'eliminar-usuarios']);
         Permission::create(['name' => 'ver-reportes']);
 
         // Asignar permisos a los roles
         $admin->givePermissionTo(['crear-usuarios']);
         $adminPremium->givePermissionTo(['crear-usuarios', 'eliminar-usuarios', 'ver-reportes']);
         $adminBasico->givePermissionTo(['crear-usuarios', 'ver-reportes']);
         $estudiante->givePermissionTo(['ver-reportes']);    
    }
}
