<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta del Clima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2>Consulta del Clima</h2>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad:</label>
            <input type="text" id="ciudad" class="form-control" placeholder="Ej: San Salvador">
            <button class="btn btn-dark mt-2" onclick="consultarClima()">Consultar</button>
        </div>
 
        <div id="resultado" class="card mt-3 d-none">
            <div class="card-body text-center">
                <h5 class="card-title" id="nombreCiudad"></h5>
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <img id="iconoClima" src="" alt="icono clima" style="width: 80px; height: 80px;">
                </div>
                <p class="card-text" id="temperatura"></p>
                <p class="card-text" id="descripcion"></p>
                <p class="card-text text-muted d-none" id="horaLocal"></p>
 
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Temperatura Mín.</th>
                                <th>Temperatura Máx.</th>
                                <th>Humedad</th>
                                <th>Viento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="temp_min"></td>
                                <td id="temp_max"></td>
                                <td id="humedad"></td>
                                <td id="viento"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 
    <script>
 
        // Consultando la API Key desde la variable de entorno
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
                
                const iconCode = data.weather[0].icon;
                document.getElementById('iconoClima').src = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
 
                // Verificamos si la ciudad está en El Salvador (código país: SV)
                if (data.sys.country === 'SV') {
                    const utcTimestamp = data.dt;
                    const localTime = new Date(utcTimestamp * 1000);
 
                    const zonaHoraria = 'America/El_Salvador';
                    const horaFormateada = localTime.toLocaleString('es-SV', {
                        timeZone: zonaHoraria,
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
 
                    document.getElementById('horaLocal').classList.remove('d-none');
                    document.getElementById('horaLocal').innerText = `Fecha y hora local El Salvador: ${horaFormateada}`;
                } else { // Por lo contrario si la ciudad no es de El Salvador, ocultamos la hora local
                    document.getElementById('horaLocal').classList.add('d-none');
                }
 
                document.getElementById('resultado').classList.remove('d-none');
                document.getElementById('nombreCiudad').innerText = `Clima en ${data.name}`;
                document.getElementById('temperatura').innerText = `Temperatura: ${data.main.temp} °C`;
                document.getElementById('descripcion').innerText = `Descripción: ${data.weather[0].description}`;
 
                // Actualiza los datos de la tabla
                document.getElementById('temp_min').innerText = `${data.main.temp_min} °C`;
                document.getElementById('temp_max').innerText = `${data.main.temp_max} °C`;
                document.getElementById('humedad').innerText = `${data.main.humidity} %`;
                document.getElementById('viento').innerText = `${data.wind.speed} m/s`;
            } catch (error) {
                alert("Error al consultar el clima. Verifica el nombre de la ciudad.");
                console.error(error);
            }
        }
    </script>
</body>
</html>
