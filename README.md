# Desarrollo de API


馃敤 Instrucciones para su funcionamiento
Requiere Copiar o Clonar el repositorio.

**Lista de comandos**

    git clone gh repo clone Guerrero85/Graph-API_Laravel
    cd Graph-API_Laravel
    composer install
    cp .env.example .env
    
**Aseg煤rese de establecer la informaci贸n de conexi贸n de la base de datos correcta antes de ejecutar las migraciones** [Variables de entorno](#variables-de-entorno)

    php artisan migrate 
    php artisan serve

Ahora puede acceder al servidor en http://localhost:8000

## Database seeding

**Rellene la base de datos con datos iniciales con relaciones que contienen Nodos padres e hijos. Esto puede ayudarlo a comenzar a probar r谩pidamente la API o acoplar una interfaz y comenzar a usarla con contenido listo.**

Abra Databases y establezca los valores de propiedad seg煤n sus requisitos

    database/seeds/NodoSeeder.php

Ejecute el seeder de base de datos y listo.

    php artisan db:seed

***Nota***: Se recomienda tener una base de datos limpia antes de usar Seeders. Puede actualizar sus migraciones en cualquier momento para limpiar la base de datos ejecutando el siguiente comando

    php artisan migrate:refresh --seed
    
Se puede acceder a la API en [http://localhost:8000/api/nodo](http://127.0.0.1:8000/api/nodo).

## Especificaci贸n API

Esta aplicaci贸n se adhiere a las especificaciones de API establecidas por el equipo de [Laravel](https://laravel.com/api/9.x/). 
Esta api tiene como funcion poder Crear, Eliminar y Listar nodos padres e hijos como asi poder almacenarlos en una base de datos

----------

# Descripci贸n general del c贸digo

## Dependencies

- [nestedset](https://github.com/lazychaser/laravel-nestedset) - Para manejo de nodos 
- [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger) - Para la documentacion y manejo de informacion de API por interfaz grafica 

## Folders

- `app` - Contiene todos los modelos de Eloquent.
- `app/Http/Controllers/Api` - Contiene todos los controladores api.
- `app/Http/Models` - Contiene todos los Modelos para la aplicaci贸n.
- `app/Http/Requests` - Contiene todas las solicitudes de formulario api.
- `config` - Contiene todos los archivos de configuraci贸n de la aplicaci贸n.
- `database/migrations` - Contiene todas las migraciones de bases de datos.
- `database/seeds` - Contiene el Seeders de base de datos.
- `routes` - Contiene todas las rutas api definidas en el archivo api.php

***Nota***: Todas las demas carpetas del proyecto que no han sido utilizada para este ejemplo en esta documentacion ha sido omitidas


|Package|Documentaci贸n|Complemento|
|:-----:|:-----------:|:--------:|
| [![package](resources/image/packe-laravel.png)](https://github.com/lazychaser/laravel-nestedset) | [![documentations](resources/image/api-laravel.png)](https://laravel.com/docs/9.x/eloquent-resources) | [![Group Chat](resources/image/swagger-laravel.png)](https://github.com/DarkaOnLine/L5-Swagger) |
