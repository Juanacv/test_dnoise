Prueba técnica empresa DNOISE



Programada en Laravel 5.2


### Installación ###

* `git clone https://github.com/Juanacv/test_dnoise.git test`
* `cd test`
* `composer install`
* `mv .env.example .env`
* `php artisan key:generate`
* Crear la base de datos importando el archivo test_dnoise.sql
* Rellenar el archivo .env con los datos de conexión a la base de datos
* El .htaccess dentro de public está configurado para que se vea apuntando simplemente a http://localhost
* Hay que cambiar /etc/apache2/sites-available/000-default.conf y añadir

```
DocumentRoot /directory/to/test/public
<Directory "/directory/to/test">
    Options Indexes FollowSymlinks Multiviews
    AllowOverride All
</Directory>
```

* En /etc/apache2/apache2.conf

```
<Directory /directory/to/test>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```

* Comprobar que mod_rewrite está instalado y activarlo

`sudo a2enmod rewrite`

`sudo service apache2 reload`

