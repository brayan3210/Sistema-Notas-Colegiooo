# Sistema Final Colegio

<p align="center">
  <a href="https://github.com/brayan3210/Sistema-Notas-Colegiooo">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

[![Build Status](https://github.com/brayan3210/Sistema-Notas-Colegiooo/actions/workflows/tests.yml/badge.svg)](https://github.com/brayan3210/Sistema-Notas-Colegiooo/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://opensource.org/licenses/MIT)

---

## 📋 Descripción

**Sistema Final Colegio** es una plataforma web desarrollada en Laravel que automatiza la gestión académica y administrativa de un colegio. Permite el registro de estudiantes, manejo de notas, generación de reportes, control de matrícula y pensión, gestión de documentos y mucho más.

Toda la documentación detallada, incluyendo diagramas, flujos y especificaciones de cada módulo, está disponible en DeepWiki:

👉 [Documentación completa en DeepWiki](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO)

---

## 📑 Table of Contents

1. [Características Principales](#caracter%C3%ADsticas-principales)
2. [Requisitos](#requisitos)
3. [Instalación](#instalaci%C3%B3n)
4. [Configuración](#configuraci%C3%B3n)
5. [Uso](#uso)
6. [Estructura del Proyecto](#estructura-del-proyecto)
7. [Tecnologías](#tecnolog%C3%ADas)
8. [Contribuciones](#contribuciones)
9. [Licencia](#licencia)

---

## 🚀 Características Principales

* Gestión de usuarios y control de acceso por roles (Admin, Profesor, Padre de familia).
* Registro y edición de datos de estudiantes.
* Sistema de calificaciones por periodos académicos.
* Generación de certificados y reportes en PDF.
* Gestión de documentos adjuntos (registros civiles, boletas, fotos, etc.).
* Automatización de tareas con Laravel Scheduler.
* Panel administrativo con métricas y dashboards.
* Integración con correo para notificaciones.

---

## 🛠 Requisitos

* PHP >= 8.1
* Composer
* MySQL o PostgreSQL
* Node.js y npm (para assets)
* Extensiones de PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON

---

## 💡 Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/brayan3210/Sistema-Notas-Colegiooo.git
   cd Sistema-Notas-Colegiooo
   ```
2. Instala dependencias de PHP:

   ```bash
   composer install
   ```
3. Instala dependencias de frontend:

   ```bash
   npm install
   npm run dev
   ```
4. Copia el archivo de entorno y genera la clave de aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Configura variables de entorno en `.env` (base de datos, correo, almacenamiento).
6. Ejecuta migraciones y seeders:

   ```bash
   php artisan migrate --seed
   ```
7. Inicia el servidor local:

   ```bash
   php artisan serve
   ```

---

## ⚙️ Configuración

Revisa la documentación en DeepWiki para configurar roles, permisos, rutas de almacenamiento y comandos programados:

* [Configuración Básica](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#6-Configuration-Setup)
* [Middleware de Acceso](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#8-Access-Control-Middleware)
* [Scheduler y Jobs](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#21-Scheduled-Tasks-Automation)

---

## 🎓 Uso

* **Admin:** Gestiona usuarios, revisa reportes y configura el sistema.
* **Profesor:** Registra y edita notas, genera certificados de sus estudiantes.
* **Padre de familia:** Consulta calificaciones y documentos de sus hijos.

Para flujos de uso detallados, consulta:

* [Proceso de Matrícula](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#10-Student-Registration-Process)
* [Gestión de Notas](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#13-Academic-System)

---

## 📂 Estructura del Proyecto

```plaintext
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/
└── Console/

resources/
├── views/
└── sass/

routes/
├── web.php
└── api.php

database/
├── migrations/
└── seeders/
```

---

## 🛠 Tecnologías

* **Framework:** Laravel
* **Lenguaje:** PHP 8.x
* **Base de datos:** MySQL/PostgreSQL
* **Frontend:** Blade, Tailwind CSS, Alpine.js
* **Testing:** PHPUnit
* **CI/CD:** GitHub Actions

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Por favor, revisa las pautas en DeepWiki:

👉 [Guía de Contribución](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO#Contributing)

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta [LICENSE](LICENSE) para más detalles.
