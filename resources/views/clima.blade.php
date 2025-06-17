<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta del Clima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Consulta del Clima</h2>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad:</label>
            <input type="text" id="ciudad" class="form-control" placeholder="Ej: San Salvador">
            <button class="btn btn-primary mt-2" onclick="consultarClima()">Consultar</button>
        </div>

        <div id="resultado" class="card mt-3 d-none">
            <div class="card-body">
                <h5 class="card-title" id="nombreCiudad"></h5>
                <p class="card-text" id="temperatura"></p>
                <p class="card-text" id="descripcion"></p>
            </div>
        </div>
    </div>

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const API_KEY = "{{ $apiKey }}";

        async function consultarClima() {
            const ciudad = document.getElementById('ciudad').value.trim();
            if (ciudad === '') {
                alert('Por favor escribe una ciudad.');
                return;
            }

            const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${API_KEY}&units=metric&lang=es`;

            try {
                const response = await axios.get(url);
                const data = response.data;
                document.getElementById('resultado').classList.remove('d-none');
                document.getElementById('nombreCiudad').innerText = `Clima en ${data.name}`;
                document.getElementById('temperatura').innerText = `Temperatura: ${data.main.temp} °C`;
                document.getElementById('descripcion').innerText = `Descripción: ${data.weather[0].description}`;
            } catch (error) {
                alert("Error al consultar el clima. Verifica el nombre de la ciudad.");
                console.error(error);
            }
        }
    </script>
</body>
</html>
