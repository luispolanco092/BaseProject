<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Libro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .card-title {
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .btn-action {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Detalles del Libro</h1>
                    <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al listado
                    </a>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Información completa
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $libro->titulo }}</h3>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                                <p><strong>Género:</strong> {{ $libro->genero }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Año de publicación:</strong> {{ $libro->anio }}</p>
                                <p><strong>Estado:</strong>
                                    <span class="badge bg-{{ $libro->estado == 'disponible' ? 'success' : 'warning' }}">
                                        {{ ucfirst($libro->estado) }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('libros.index') }}" class="btn btn-primary btn-action">
                                <i class="bi bi-list-ul"></i> Volver
                            </a>
                            @can('libros.edit')
                            <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning btn-action">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
