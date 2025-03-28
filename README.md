## Proyecto Laravel Auth

Usando laravel 10
 Environment ....................................................................................  
  Application Name ....................................................................... Laravel  
  Laravel Version ....................................................................... 10.48.29  
  PHP Version .............................................................................. 8.2.0  
  Composer Version ......................................................................... 8.2.0  
  Environment .............................................................................. local  
  Debug Mode ............................................................................. ENABLED  
  URL .................................................................................. localhost  
  Maintenance Mode ........................................................................... OFF  

## install
composer install

Si usas el siguiente comando ignora los demás comandos para ejecutar los roles y usuarios

php artisan migrate --seed 


//Crear Roles y Permisos

php artisan db:seed --class=RolesAndPermissionsSeeder

php artisan serve

## Roles y Permisos

-Para cambiar el nombre de los roles está en la tabla roles

-los roles y permisos están en la tabla roles_has_permissions

-Para cambiar el rol a un usuario se lo cambia en la tabla de model_has_roles en la columna role_id

## Crear usuarios 

php artisan db:seed --class=UserSeeder


                'name' => 'Admin Principal',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
          
                'name' => 'Admin Básico',
                'email' => 'admin.basico@example.com',
                'password' => Hash::make('password'),
                'role' => 'adminBasico',
            
                'name' => 'Admin Premium',
                'email' => 'admin.premium@example.com',
                'password' => Hash::make('password'),
                'role' => 'adminPremium',
           
                'name' => 'Estudiante',
                'email' => 'estudiante@example.com',
                'password' => Hash::make('password'),
                'role' => 'estudiante',
  