
# Netdev

⭐ Una red social para los desarroladores de software en donde puedes compartir, aprender y conectar con los demás ⭐

## Tech Stack

**Client:** HTML, CSS, Livewire, Javascript, 
Laravel Blade

**Server:** Laravel 11, MySQL 


## Instalación

a) Empieza clonando el repositorio o descargando el .zip 

b) Dirigite a la raiz del proyecto y abre la terminal

c) Se debe tener instalado php 8, composer y node. 

d) Instalamos los modulos de node 

```bash
  npm install
```
e) Instalamos los modulos de composer 

```bash
  composer install ó composer update
```
f) Generamos una llave para la aplicación

```bash
  php artisan key:generate
```
g) Realizamos las migraciones correspondientes

```bash
  php artisan migrate
```

## Variables de entorno

Para ejecutar esta aplicacion deberas añadir las siguientes variables de entorno en tu archivo .env

`APP_URL` 

`DB_CONNECTION` `DB_HOST` `DB_PORT` `DB_DATABASE` `DB_USERNAME` `DB_PASSWORD`

## Ejecución

Arrancamos la aplicación en modo desarrollo en 2 pestañas diferentes en la terminal

```bash
  php artisan serve
```
```bash
  npm run dev
```

Aplicacion lista en: http://localhost:8000

## Authors

- [@snaisdev](https://github.com/snaispro77)

