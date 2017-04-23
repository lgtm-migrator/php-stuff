# php-stuff

### Configuracion
En application/config/config.php se debe modificar la variable '$config['base_url']' y en application/config/database.php se debe modificar 'username', 'password' y 'database'

### Error creando usuario phpmyadmin
Si aparece 'No puedo leer el directorio de 'C:\xampp\mysql\lib\plugin\' (Error: 2 "No such file or directory")', hay que crear el directorio C:\xampp\mysql\lib\plugin

### Quitar mensajes de error PHP
Cambiar la variable 'ENVIRONMENT' en root/index.php a production. [Mas informacion](https://www.codeigniter.com/user_guide/general/security.html)