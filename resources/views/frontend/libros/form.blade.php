<div class="mb-3">
    <label>Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Autor</label>
    <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Género</label>
    <input type="text" name="genero" class="form-control" value="{{ old('genero', $libro->genero ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Año</label>
    <input type="number" name="anio" class="form-control" value="{{ old('anio', $libro->anio ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Estado</label>
    <select name="estado" class="form-control" required>
        <option value="disponible" {{ (old('estado', $libro->estado ?? '') == 'disponible') ? 'selected' : '' }}>Disponible</option>
        <option value="prestado" {{ (old('estado', $libro->estado ?? '') == 'prestado') ? 'selected' : '' }}>Prestado</option>
    </select>
</div>
<button class="btn btn-success">Guardar</button>
