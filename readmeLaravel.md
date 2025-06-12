Levantar el servidor: php artisan serve
Cambiar algo en el autoload: composer dump-autoload


Mostrar la base de datos: php artisan db:show
Levantar las migraciones: php artisan migrate 
Borrarlas y volver a levantarlas:  php artisan migrate:fresh 
Crear migraciones: php artisan make:migration
Agregar valores a la tabla: 
php artisan tinker
> App\Models\Job::create(['title' => 'flor', 'location' => 'Uruguay']);
Crear modelos hp artisan make:model Comment
Generar contenido adentro de las tablas: ➜  TasksNotifications git:(feature/laravelcasts) ✗ php artisan tinker
Psy Shell v0.12.8 (PHP 8.4.7 — cli) by Justin Hileman
> Lightit\Shared\App\Job::factory()->create();
crear model y factory:  php artisan make:model Employeer -f
Crear model, factory y migration: php artisan make:Model Tag -mf

Route::get('/jobs/{job}', [JobController::class, 'show']);
ACA SI QUIERO OTRA COSA QUE NO SEA EL ID LO TENGO QUE ESPECIFICAR. job:name. por defecto busca en la tabla de la base de datos el id cuando se le pasa el modelo completo
