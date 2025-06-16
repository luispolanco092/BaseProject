<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2>Crear Libro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('libros.create')
    <form id="libroForm" action="{{ route('libros.store') }}" method="POST" novalidate>
        @csrf
        @include('frontend.libros.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-primary btn-action">
                                <i class="bi bi-list-ul"></i> Volver
                            </a>
    </form>
    @else
        <div class="alert alert-warning">No tienes permiso para crear libros.</div>
    @endcan

</div>

<script>
document.getElementById('libroForm').addEventListener('submit', function(e) {
    let form = e.target;
    let errors = [];

    let titulo = form.titulo.value.trim();
    if (!titulo) errors.push("el título es obligatorio.");

    let autor = form.autor.value.trim();
    if (!autor) errors.push("el autor es obligatorio.");

    let genero = form.genero.value.trim();
    if (!genero) errors.push("el género es obligatorio.");

    let anio = form.anio.value.trim();
    let currentyear = new date().getfullyear();
    if (!anio) errors.push("el año es obligatorio.");
    else if (!/^\d{4}$/.test(anio)) errors.push("el año debe tener 4 dígitos.");
    else if (anio < 1000 || anio > currentyear) errors.push("el año debe estar entre 1000 y " + currentyear + ".");

    let estado = form.estado.value;
    if (estado !== 'disponible' && estado !== 'prestado') errors.push("Estado inválido.");

    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
    }
});
</script>
    <script>
//localStorage
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('libroForm');

    if (localStorage.getItem('libroData')) {
        const libroData = JSON.parse(localStorage.getItem('libroData'));
        form.titulo.value = libroData.titulo || '';
        form.autor.value = libroData.autor || '';
        form.genero.value = libroData.genero || '';
        form.anio.value = libroData.anio || '';
        form.estado.value = libroData.estado || 'disponible';
    }

    form.addEventListener('input', function() {
        const libroData = {
            titulo: form.titulo.value,
            autor: form.autor.value,
            genero: form.genero.value,
            anio: form.anio.value,
            estado: form.estado.value,
        };
        localStorage.setItem('libroData', JSON.stringify(libroData));
    });
    form.addEventListener('submit', function() {
        localStorage.removeItem('libroData');
    });
});
</script>


</body>
</html>
