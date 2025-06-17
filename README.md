# Ingeniería en Desarrollo de Software

## Desarrollo y Técnicas de Aplicaciones Web - DTW135

### Integrantes del Equipo:

- **Vilma Melissa Alvarado Parada**  - AP22024
- **Luis Miguel Polanco Pacheco**    - PP22054
- **Wilian Alberto Salinas Vásquez** - SV99004
- **William Orlando Rivera Aragón**  - RA22045
- **Darwin Geovanny Zaldaña Avila**  - ZA20003

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
 
- **Laravel 12**: framework principal
- **Blade**: motor de plantillas
- **Bootstrap 5**: interfaz y estilos responsivos
- **MariaDB**: motor de base de datos relacional
- **Laravel Gate/Policies**: para control de permisos
- **JavaScript (vanilla)**: validaciones de formularios en el navegador

 ---

 ### 🔧 Tecnologías y herramientas utilizadas
 
- **Axios**: librería JavaScript para enviar peticiones HTTP desde el cliente.
- **Bootstrap 5**: framework CSS usado para dar estilo y estructura visual a los resultados (cards y tablas).
- **JavaScript**: lógica de interacción en la vista, incluyendo uso de funciones, validaciones, manipulación del DOM y manejo de respuestas JSON.
- **OpenWeatherMap API**: fuente externa de datos climáticos en formato JSON.

---

## 🌦️ Consumo de API del Clima (OpenWeatherMap)
 
Como parte del requerimiento **4. Consumo de API Rest Moderna**, se integró exitosamente una API pública de clima proporcionada por [OpenWeatherMap](https://openweathermap.org/api). Esta funcionalidad permite consultar información meteorológica en tiempo real para cualquier ciudad del mundo.
  
