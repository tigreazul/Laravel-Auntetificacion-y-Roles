
## Comandos para la ejecucion

### Creacion del ROL
php artisan make:model Role -m

### Migracion de roles usuario
php artisan make:migration create_role_user_table

### Agregar seeders para roles
php artisan make:seeder RoleTableSeeder

### Ejecutar comando para migrar seeders
php artisan migrate:refresh --seed
