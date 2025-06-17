# Ingeniería en Desarrollo de Software

## Desarrollo y Técnicas de Aplicaciones Web - DTW135

### Integrantes del Equipo:

- **Darwin Geovanny Zaldaña Avila**  - ZA20003
- **Luis Miguel Polanco Pacheco**    - PP22054
- **Vilma Melissa Alvarado Parada**  - AP22024
- **William Orlando Rivera Aragón**  - RA22045
- **Wilian Alberto Salinas Vásquez** - SV99004

---

## 📚 CRUD: Registro de Libros
 
Como parte del requerimiento principal del Proyecto Final, se desarrolló un **CRUD completo** para gestionar el Registro de Libros. Este módulo permite realizar operaciones de **crear, leer, actualizar y eliminar** libros en una base de datos relacional usando Laravel 12 y MariaDB.
 
### 🧾 Campos incluidos
 
Cada libro registrado contiene los siguientes campos:
 
- **Título**
- **Autor**
- **Género**
- **Año**
- **Estado**: puede ser _prestado_ o _disponible_
 
---
 
### ⚙️ Funcionalidades implementadas
 
- ✅ **Listado completo de libros** en una tabla responsiva
- ✅ **Creación de nuevos libros** con formularios validados
- ✅ **Edición de registros existentes**
- ✅ **Eliminación lógica y/o permanente** de libros
- ✅ **Control de permisos** usando directivas `@can`, restringiendo accesos según roles de usuario
- ✅ **Validaciones en backend** usando Laravel Validator
- ✅ **Validaciones en frontend** usando JavaScript
- ✅ **Mensajes y alertas visuales** usando clases de Bootstrap para mejorar la experiencia del usuario
 
---
 
### 💾 Tecnologías utilizadas
 
- **Laravel**: Framework 10.48.25
- **PHP**: 8.3.22
- **Blade**: motor de plantillas
- **Bootstrap 5**: interfaz y estilos responsivos
- **MariaDB**: motor de base de datos relacional
- **Laravel Gate/Policies**: para control de permisos
- **JavaScript (vanilla)**: validaciones de formularios en el navegador
 
---
 
## 🌦️ Consumo de API del Clima (OpenWeatherMap)
 
Como parte del requerimiento **4. Consumo de API Rest Moderna**, se integró exitosamente una API pública de clima proporcionada por [OpenWeatherMap](https://openweathermap.org/api). Esta funcionalidad permite consultar información meteorológica en tiempo real para cualquier ciudad del mundo.
 
### 🔧 Tecnologías y herramientas utilizadas
 
- **Axios**: librería JavaScript para enviar peticiones HTTP desde el cliente.
- **Bootstrap 5**: framework CSS usado para dar estilo y estructura visual a los resultados (cards y tablas).
- **JavaScript**: lógica de interacción en la vista, incluyendo uso de funciones, validaciones, manipulación del DOM y manejo de respuestas JSON.
- **OpenWeatherMap API**: fuente externa de datos climáticos en formato JSON.
 
### 📌 Detalles implementados
 
- Se consumió la API REST de OpenWeatherMap mediante peticiones `GET` usando **Axios** desde el frontend.
- Se procesó la **respuesta en formato JSON**, accediendo a campos como:
  - Temperatura actual, mínima y máxima.
  - Humedad relativa.
  - Velocidad del viento.
  - Descripción textual del clima.
  - Ícono representativo del estado climático.
  - Código del país (`sys.country`), utilizado para validaciones condicionales.
- Los resultados se presentaron de forma visual y amigable en una interfaz estructurada:
  - Una **card** muestra los datos principales de la ciudad consultada.
  - Una **tabla** con más detalles meteorológicos.
  - Se incluyó un **ícono del clima** dinámico y representativo.
  - Se agregó la **hora local exacta**, solo visible si la ciudad consultada pertenece a **El Salvador**, usando validación por país.
- La clave de la API se almacena de forma segura en el archivo `.env`, siguiendo buenas prácticas.
