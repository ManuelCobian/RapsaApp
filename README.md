# 🚀 Proyecto Laravel Repsa

Sistema desarrollado en Laravel para la gestión del proyecto **Repsa**.

Este repositorio contiene el backend y frontend necesarios para ejecutar la aplicación en un entorno local de desarrollo.

---

## 📋 Requisitos previos

Antes de comenzar, asegúrate de contar con lo siguiente instalado en tu equipo:

- PHP compatible con Laravel
- Composer
- Node.js y npm
- MySQL activo

---

## ⚙️ Instalación

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio


2️⃣ Instalar dependencias
composer install
npm install

3️⃣ Archivo .env

APP_NAME=Repsa
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
APP_LOCALE=es

4️⃣ Generar la clave de la aplicación
php artisan key:generate

 Configura tu conexión a MySQL en el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=repsa_app
DB_USERNAME=root
DB_PASSWORD=

Ejecuta las migraciones junto con los seeders:

php artisan migrate --seed
