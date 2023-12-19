<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://colombiapcc.com/assets/img/colorsHistori.jpeg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="#"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="#"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="#"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="#"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca del PCC

El pcc es un proyecto de api enfocado en la propagación del conocimiento relacionado al paisaje cultural cafetero ................

- [Mas informacion en](https://github.com/maylerx/pcc).

PCCApi es accessible, potente y provee de contenido multimedia


## Instalación
### Requisitos del host (recomendados)
#### PHP
    PHP 8.1.18 (cli) (built: Apr 14 2023 04:39:46) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.18, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.18, Copyright (c), by Zend Technologies
o compatibles,
<a href="https://www.scriptcase.net/docs/es_es/v9//manual/02-scriptcase-installation/06-linux_php/">instalación de php 8.1</a>
#### Apache2 
Server version: Apache/2.4.56 (Debian)
Server built:   2023-04-02T03:06:01
#### Composer
version 2.6.5 2023-10-06 10:11:52
<a href="https://bahiaxip.com/entrada/instalar-composer-en-debian-10">instalación de composer</a>

#### Mysql
mysql  Ver 15.1 Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64) using  EditLine wrapper


#### Configuración del php.ini
En la ruta(en caso de usar apache /etc/php/8.1/apache2/php.ini) del php.ini se debe incrementar el tamaño de la subida de archivos para que los audios.mp3 de 10MB puedan subirse al servidor, modifique los valores preterminados por los siguientes
upload_max_filesize = 10M
post_max_size = 10M

## ejecucion del proyecto
Una vez instalados dichos requisitos, en la raiz del proyecto se debe ejecutar
composer install
para instalar las dependencias del proyecto laravel, para correr el proyecto en localhost se ejecuta php artisan serve 
y para desplegarlo en el servidor, apache se debe apuntar el dominio a la carpeta public. Para mas informacion acerca de
proyectos laravel consultar 
<a href="https://laravel.com/docs/10.x/installation">instalación  de proyecto laravel</a>


si descubres alguna vulnerabilidad en pccApi, por favor envía un email a [optt.itudes@gmail.com](mailto:optt.itudes@gmail.com). 

## License
PCCAPI is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
