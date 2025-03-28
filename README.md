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
php artisan migrate

//Crear Roles y Permisos
php artisan db:seed --class=RolesAndPermissionsSeeder

php artisan serve

## Roles y Permisos

-Para cambiar el nombre de los roles está en la tabla roles
-los roles y permisos están en la tabla roles_has_permissions
-Para cambiar el rol a un usuario se lo cambia en la tabla de model_has_roles en la columna role_id