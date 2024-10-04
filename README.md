Inicializar la instalacion de dependencias con:
->php composer install
->npm install

Debes crear una db que se llame: gestion_libros

Crear un archivo .env en la raiz del proyecto y ingresar las credenciales de su DB siguiendo el formato que
esta en el archivo .env.example

iniciar el comando para iniciar las migraciones y los inserts de datos falsos
->php composer migrate --seed

inicializar el servidor con
->php artisan serve
->npm run dev

Opcional--
Ingresa a tu DB con cualquier gestor y toma un correo electronico de la tabla user para logearte, la password de todos los usuarios es paswword

Opcional--
Registrate con tu propio correo y password
