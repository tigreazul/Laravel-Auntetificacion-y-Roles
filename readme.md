
## Comandos para la ejecucion

### Creacion del ROL
    php artisan make:model Role -m

### Migracion de roles usuario
    php artisan make:migration create_role_user_table

### Agregar seeders para roles
    php artisan make:seeder RoleTableSeeder

> __NOTA:__ Los comandos anteriores son parte de la configuración realizada, con el siguiente comando podremos iniciar, se crearan las tablas en la base de datos.

### Ejecutar comando para migrar seeders
    php artisan migrate:refresh --seed

### Autoload Dump
    composer dump-autoload


# Theme
Para la cracion del admin se realizo usando el siguiente template.

https://colorlib.com//polygon/admindek/default/