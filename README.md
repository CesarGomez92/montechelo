# montechelo

Esta prueba está hecha en laravel 8y Vue Js v2, para correr el proyecto localmente, tendremos los siguientes pre requisitos
-	Tener composer instalado
-	Tener node Js instalado
-	Tener Mysql 8 instalado
-	Tener laravel 7.4  instalado 

Luego de verificar estos requisitos realizar los siguientes pasos:
1- Clonar el proyecto 
```
https://github.com/CesarGomez92/montechelo.git
```
O descargar como zip.

2- Abrir una consola de comando y crear la base de datos manualmente de la siguiente manera:
```
mysql -uroot -p
password: mypassword
create database montechelo_business;
exit;
```

3- Ingresar a la carpeta montechelo_business

4- En el archivo .env definir las siguientes variables
```
// .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=montechelo_business
DB_USERNAME=db username
DB_PASSWORD=db password
```

5- Ejecutar los siguientes comandos para instalar dependencias
```
composer install
npm install
```

6- Ejecutar migraciones y seeders
```
php artisan migrate
php artisan db:seed --class=UsersSeeder
```

7- Subir el servidor de desarrollo local
```
php artisan serve --port=5001
```

*Nota:* dejar la consola abierta y ejecutando el comando "php artisan serve --port=5001" mientras queramos que el servicio este funcional

8- Volver a la carpeta raiz e ingresar a la carpeta montechelo_validations

9- Abrir una segunda consola de comando y crear la base de datos manualmente de la siguiente manera:
```
mysql -uroot -p
password: mypassword
create database montechelo_validations;
exit;
```

10- En el archivo .env definir las siguientes variables
```
// .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=montechelo_validations
DB_USERNAME=db username
DB_PASSWORD=db password
```

11- Ejecutar los siguientes comandos para instalar dependencias
```
composer install
npm install
```

12- Ejecutar migraciones
```
php artisan migrate
php artisan validations:create-default-values
```

13- Subir el servidor de desarrollo local
```
php artisan serve --port=5000
```

*Nota:* dejar la consola abierta y ejecutando el comando "php artisan serve --port=5001" mientras queramos que el servicio este funcional

14- Volver a la carpeta raiz e ingresar a la carpeta montechelo-web

15- Abrir una ventana de comandos y ejecutar el siguiente comando para instalar dependencias
```
npm install
```

16- ejecutar el comando siguiente comando:
```
npm run serve
```

17- Abrir un navegador (Google Chrome de preferencia) y dirigirse a http://localhost:8080/

18- navegue el proyecto