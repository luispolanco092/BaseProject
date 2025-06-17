# Ingeniería en Desarrollo de Software

## Desarrollo y Técnicas de Aplicaciones Web - DTW135

### Integrantes del Equipo:

- **Vilma Melissa Alvarado Parada**  - AP22024
- **Luis Miguel Polanco Pacheco**    - PP22054
- **Wilian Alberto Salinas Vásquez** - SV99004
- **William Orlando Rivera Aragón**  - RA22045
- **Darwin Geovanny Zaldaña Avila**  - ZA20003

---
## 🌦️ Consumo de API del Clima (OpenWeatherMap)
 
Como parte del requerimiento **4. Consumo de API Rest Moderna**, se integró exitosamente una API pública de clima proporcionada por [OpenWeatherMap](https://openweathermap.org/api). Esta funcionalidad permite consultar información meteorológica en tiempo real para cualquier ciudad del mundo.
 
### 🔧 Tecnologías y herramientas utilizadas
 
- **Laravel 12**: framework PHP utilizado como base para la aplicación web.
- **Base de Datos MariaDB**: un sistema de gestión de base de datos relacional de codigo abierto que deriva de MySQL compatible con proyectos desarrollados en Laravel.
- **Axios**: librería JavaScript para enviar peticiones HTTP desde el cliente.
- **Bootstrap 5**: framework CSS usado para dar estilo y estructura visual a los resultados (cards y tablas).
- **JavaScript (ES6+)**: lógica de interacción en la vista, incluyendo uso de funciones, validaciones, manipulación del DOM y manejo de respuestas JSON.
- **OpenWeatherMap API**: fuente externa de datos climáticos en formato JSON.
 
---

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
    
-----

