<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h1>Listado de Libros</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @can('libros.create')
    <a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">Nuevo Libro</a>
    @endcan

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th><th>Autor</th><th>Género</th><th>Año</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->genero }}</td>
                <td>{{ $libro->anio }}</td>
                <td>{{ ucfirst($libro->estado) }}</td>
                <td>
                    @can('libros.view')
                    <a href="{{ route('libros.show', $libro) }}" class="btn btn-info btn-sm">Ver</a>
                    @endcan

                    @can('libros.edit')
                    <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning btn-sm">Editar</a>
                    @endcan

                    @can('libros.delete')
                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este libro?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
