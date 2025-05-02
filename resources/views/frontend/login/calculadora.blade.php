<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora SOAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="mb-4">Calculadora con Servicio SOAP</h2>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('calcular') }}">
            @csrf

            <div class="mb-3">
                <label for="num1" class="form-label">Número 1:</label>
                <input type="number" name="num1" id="num1" class="form-control"
                    value="{{ old('num1', $numero1 ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="num2" class="form-label">Número 2:</label>
                <input type="number" name="num2" id="num2" class="form-control"
                    value="{{ old('num2', $numero2 ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="operacion" class="form-label">Operación:</label>
                <select name="operacion" id="operacion" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <option value="sumar" {{ old('operacion', $operacion ?? '') == 'sumar' ? 'selected' : '' }}>Sumar
                    </option>
                    <option value="multiplicar"
                        {{ old('operacion', $operacion ?? '') == 'multiplicar' ? 'selected' : '' }}>Multiplicar
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        @isset($resultado)
            <div class="alert alert-success mt-4">
                <label>Resultado:</label>
                <input type="text" class="form-control" value="{{ $resultado }}" readonly>
            </div>
        @endisset
    </div>

</body>

</html>
