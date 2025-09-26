# 📌 Tasks API

**Tasks API** es una aplicación en **Laravel 10** que gestiona un sistema de **tareas**, con relaciones entre **usuarios** y **empresas**.  
Incluye **CRUD de tareas**, validaciones personalizadas (máximo de 5 tareas pendientes por usuario), migraciones y seeders con datos de prueba, además de endpoints RESTful listos para usarse y probados con Postman.

---

## 🚀 Características principales
- ✅ CRUD completo de tareas
- ✅ Relaciones entre **usuarios**, **empresas** y **tareas**
- ✅ Validación de datos
- ✅ Límite de **5 tareas pendientes por usuario**
- ✅ Endpoints RESTful
- ✅ Migraciones y seeders de base de datos
- ✅ Datos de prueba incluidos para Postman

---

## 🛠️ Tecnologías utilizadas
- [Laravel 10.49.0](https://laravel.com/)
- [PHP 8.3](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [Postman](https://www.postman.com/) para pruebas de endpoints

---

## 📡 Endpoints principales

```php
1. Obtener todas las compañías
Route::get('companies', [CompanyController::class, 'index']);

2. Obtener todas las tareas
Route::get('tasks', [TaskController::class, 'index']);

3. Crear nueva tarea
Route::post('tasks', [TaskController::class, 'store']);

⚙️ Configuración de entorno (ejemplo usado en Postman)

En el archivo .env:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8001

Configurar base de datos para migracion:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks-api
DB_USERNAME=root
DB_PASSWORD=

En Postman, configurar un entorno con:
-> base_url = http://127.0.0.1:8001/api

-> content_type = application/json

-> Accept = application/json

📬 Ejemplos de pruebas con Postman

🔹 1. GET {{base_url}}/companies
Respuesta json:
{
  "data": [
    {
      "id": 1,
      "name": "Netcommerce",
      "tasks": [
        {
          "id": 1,
          "name": "Task 1",
          "description": "Task content 1",
          "user": "Akira",
          "is_completed": 0,
          "start_at": "2025-09-26 21:26:31",
          "expired_at": "2025-09-26 21:26:31"
        },
        {
          "id": 2,
          "name": "Task 2",
          "description": "Task content 2",
          "user": "Akira",
          "is_completed": 1,
          "start_at": "2025-09-26 21:26:31",
          "expired_at": null
        }
      ]
    },
    {
      "id": 2,
      "name": "Netcommerce",
      "tasks": []
    },
    {
      "id": 3,
      "name": "Netcommerce",
      "tasks": []
    }
  ]
}

---------------------------------------
🔹 2. GET {{base_url}}/tasks
Respuesta json:
{
  "data": [
    {
      "id": 1,
      "name": "Task 1",
      "description": "Task content 1",
      "user": "Akira",
      "company": {
        "id": 1,
        "name": "Netcommerce"
      }
    },
    {
      "id": 2,
      "name": "Task 2",
      "description": "Task content 2",
      "user": "Akira",
      "company": {
        "id": 1,
        "name": "Netcommerce"
      }
    },
    {
      "id": 3,
      "name": "task 3",
      "description": "task content 3",
      "user": "Akira",
      "company": {
        "id": 3,
        "name": "Netcommerce"
      }
    }
  ]
}

---------------------------------------
🔹 3. POST {{base_url}}/tasks
Petición json:
{
  "company_id": 1,
  "name": "task 3",
  "description": "task content 3",
  "user_id": 1
}

Respuesta json:
{
  "id": 3,
  "name": "task 3",
  "description": "task content 3",
  "user": "Akira",
  "company": {
    "id": 1,
    "name": "Netcommerce"
  }
}

🚫 Límite de 5 tareas pendientes por usuario

Petición (más de 5 tareas pendientes):

json:
{
  "company_id": 1,
  "name": "task 7",
  "description": "task content 7",
  "user_id": 1
}

Respuesta json
{
  "message": "El usuario no puede tener más de 5 tareas pendientes.",
  "errors": {
    "user_id": [
      "El usuario no puede tener más de 5 tareas pendientes."
    ]
  }
}

▶️ Instalación rápida

Clonar el repositorio:
git clone https://github.com/eruGMZ/tasks-api.git
cd tasks-api

Instalar dependencias:
composer install

Copiar el archivo .env y configurar la base de datos:
cp .env.example .env

Generar la clave de la aplicación:
php artisan key:generate

Ejecutar migraciones y seeders:
php artisan migrate --seed

Levantar el servidor:
php artisan serve --port=8001

Probar los endpoints en Postman 
