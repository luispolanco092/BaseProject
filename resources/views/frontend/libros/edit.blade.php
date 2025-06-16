<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2>Editar Libro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('libros.edit')
    <form id="libroForm" action="{{ route('libros.update', $libro) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @include('frontend.libros.form')
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    @else
        <div class="alert alert-warning">No tienes permiso para editar libros.</div>
    @endcan

</div>

<script>
document.getElementById('libroForm').addEventListener('submit', function(e) {
    let form = e.target;
    let errors = [];

    let titulo = form.titulo.value.trim();
    if (!titulo) errors.push("El título es obligatorio.");

    let autor = form.autor.value.trim();
    if (!autor) errors.push("El autor es obligatorio.");

    let genero = form.genero.value.trim();
    if (!genero) errors.push("El género es obligatorio.");

    let anio = form.anio.value.trim();
    let currentYear = new Date().getFullYear();
    if (!anio) errors.push("El año es obligatorio.");
    else if (!/^\d{4}$/.test(anio)) errors.push("El año debe tener 4 dígitos.");
    else if (anio < 1000 || anio > currentYear) errors.push("El año debe estar entre 1000 y " + currentYear + ".");

    let estado = form.estado.value;
    if (estado !== 'disponible' && estado !== 'prestado') errors.push("Estado inválido.");

    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
    }
});
</script>

</body>
</html>
