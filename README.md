<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## 📖 Table of Contents

* [Overview](#overview)
* [Purpose and Scope](#purpose-and-scope)
* [System Architecture Overview](#system-architecture-overview)
* [Core Architecture Components](#core-architecture-components)
* [Key System Components](#key-system-components)
* [User Roles and Access Control](#user-roles-and-access-control)
* [Academic System Design](#academic-system-design)
* [Technology Stack](#technology-stack)
* [Integration Points](#integration-points)
* [Development Standards](#development-standards)
* [Modules](#modules)

  * [Configuration & Setup](#configuration--setup)
  * [Authentication & User Management](#authentication--user-management)
  * [Access Control Middleware](#access-control-middleware)
  * [Student Management System](#student-management-system)
  * [Student Registration Process](#student-registration-process)
  * [Parent Data Management](#parent-data-management)
  * [Document Management](#document-management)
  * [Academic & Grading Systems](#academic--grading-systems)
  * [Year-end Processing & Promotion](#year-end-processing--promotion)
  * [Administrative Functions](#administrative-functions)
  * [Admin Dashboard & Reports](#admin-dashboard--reports)
  * [User Administration](#user-administration)
  * [Financial Management](#financial-management)
  * [Content & Communication](#content--communication)
  * [Scheduled Tasks & Automation](#scheduled-tasks--automation)
  * [Technical Infrastructure](#technical-infrastructure)
* [Contributing](#contributing)
* [License](#license)

---

## Overview

Sistema-Notas-Colegiooo es una aplicación web basada en Laravel diseñada para gestionar operaciones académicas en instituciones educativas. Maneja matrícula de estudiantes, evaluación académica con sistemas duales de calificación, funciones administrativas y procesamiento académico de fin de año.

## Purpose and Scope

Esta documentación proporciona una visión completa del sistema de gestión escolar, incluyendo arquitectura, componentes principales, roles de usuarios y patrones de integración. Para detalles de subsistemas específicos, consulte las secciones listadas en el menú de [DeepWiki](https://deepwiki.com/brayan3210/SISTEMAFINALCOLEGIO).

## System Architecture Overview

El sistema sigue un patrón de arquitectura en capas con separación entre presentación, lógica de negocio y datos, aprovechando el framework Laravel.

## Core Architecture Components

* **Controllers:** Gestión de lógica de negocio.
* **Models:** Definición de entidades y relaciones.
* **Views (Blade):** Interfaces de usuario.
* **Middlewares:** Control de acceso y seguridad.
* **Console Commands:** Tareas programadas y mantenimiento.

## Key System Components

| Componente               | Propósito                                   | Funcionalidades Clave                                         |
| ------------------------ | ------------------------------------------- | ------------------------------------------------------------- |
| Authentication System    | Control de acceso y gestión de roles        | Sistema de roles de tres niveles (Admin, Profesor, Usuario)   |
| Student Management       | Matrícula y gestión de datos de estudiantes | Registro, datos de padres, manejo de documentos               |
| Academic System          | Gestión de calificaciones                   | Sistemas duales de calificación según nivel de grado          |
| Administrative Functions | Operaciones y reportes escolares            | Dashboard, administración de usuarios, seguimiento financiero |
| Document Management      | Almacenamiento y organización de archivos   | Archivos de evidencia, certificados, reportes                 |
| Automation Engine        | Procesos programados                        | Procesamiento de fin de año, limpieza de datos                |

## User Roles and Access Control

Se implementa un modelo de control de acceso basado en roles con tres tipos de usuario:

* **Admin (1):** Acceso completo.
* **Profesor (2):** Gestión de notas y visualización de datos limitados.
* **Usuario (0):** Visualización básica.

### Access Control Matrix

| Función                      | Admin | Profesor |  Usuario |
| ---------------------------- | :---: | :------: | :------: |
| Gestión de usuarios          |   ✓   |     ✗    |     ✗    |
| Registro de notas            |   ✓   |     ✓    |     ✗    |
| Visualización de estudiantes |   ✓   |     ✓    | Limitado |
| Generación de reportes       |   ✓   | Limitado |     ✗    |
| Configuración del sistema    |   ✓   |     ✗    |     ✗    |
| Gestión de evidencias        |   ✓   |     ✓    |     ✗    |

## Academic System Design

Se implementa un enfoque dual de evaluación:

1. **Sistema de Calificación Estándar:** Para grados 4–9, evaluaciones numéricas.
2. **Evaluación Basada en Dimensiones:** Para grados 1–3, evaluación por competencias.

Ambos sistemas integran un procesamiento automático de promoción al 31 de diciembre de cada año.

## Technology Stack

| Capa           | Tecnología        | Propósito                                   |
| -------------- | ----------------- | ------------------------------------------- |
| Framework      | Laravel           | Estructura MVC y lógica de aplicación       |
| Frontend       | Blade Templates   | Renderizado de vistas del lado del servidor |
| Base de datos  | MySQL/PostgreSQL  | Almacenamiento de datos académicos          |
| Almacenamiento | Laravel Storage   | Gestión de documentos y reportes            |
| Tareas         | Laravel Scheduler | Operaciones automatizadas                   |
| Autenticación  | Laravel Auth      | Manejo de sesiones y seguridad              |

## Integration Points

* **Email System:** Notificaciones y restablecimiento de contraseñas.
* **File Storage:** Almacenamiento público de documentos.
* **PDF Generation:** Generación automática de certificados y reportes.
* **Scheduled Operations:** Tareas diarias y anuales automatizadas.

## Development Standards

* **MVC Architecture**: Separación clara de responsabilidades.
* **Middlewares**: Aplicación de políticas de seguridad.
* **Artisan Commands**: Comandos personalizados para tareas.
* **Eloquent ORM**: Interacciones con la base de datos.
* **Blade Templating**: Plantillas reutilizables para vistas.

## Modules

Para más detalles de configuración y uso de cada módulo, consulte la documentación completa en DeepWiki:

* [Configuration & Setup](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#6-Configuration-Setup)
* [Authentication & User Management](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#7-Authentication-User-Management)
* [Access Control Middleware](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#8-Access-Control-Middleware)
* [Student Management System](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#9-Student-Management-System)
* [Student Registration Process](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#10-Student-Registration-Process)
* [Parent Data Management](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#11-Parent-Data-Management)
* [Document Management](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#12-Document-Management)
* [Academic & Grading Systems](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#13-Academic-System)
* [Year-end Processing & Promotion](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#15-Year-end-Processing-Promotion)
* [Administrative Functions](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#16-Administrative-Functions)
* [Admin Dashboard & Reports](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#17-Admin-Dashboard-Reports)
* [User Administration](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#18-User-Administration)
* [Financial Management](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#19-Financial-Management)
* [Content & Communication](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#20-Content-Communication)
* [Scheduled Tasks & Automation](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#21-Scheduled-Tasks-Automation)
* [Technical Infrastructure](https://deepwiki.com/brayan3210/Sistema-Notas-Colegiooo#22-Technical-Infrastructure)

## Contributing

¡Gracias por contribuir! Por favor, revise la guía de contribución en la documentación oficial de Laravel.

## License

Este proyecto está licenciado bajo la [MIT License](https://opensource.org/licenses/MIT).

