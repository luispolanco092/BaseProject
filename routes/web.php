<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Login\LoginController;
use App\Http\Controllers\Controles\ControlController;
use App\Http\Controllers\Backend\Roles\RolesController;
use App\Http\Controllers\Backend\Roles\PermisoController;
use App\Http\Controllers\Backend\Perfil\PerfilController;
use App\Http\Controllers\Backend\Configuracion\ConfiguracionController;
use App\Http\Controllers\Backend\Registro\RegistroController;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\ClimaController;

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\LibroController;

Route::get('/preferencias', [XmlController::class, 'index']);
Route::get('/preferencias', [XmlController::class, 'mostrar']);


// --- LOGIN ---

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// --- CONTROL WEB ---

Route::get('/panel', [ControlController::class, 'indexRedireccionamiento'])->name('admin.panel');

// --- CALCULADORA SOAP ---

Route::get('/calculadora', [CalculadoraController::class, 'index']);
Route::post('/calcular', [CalculadoraController::class, 'calcular'])->name('calcular');
// --- ROLES ---

Route::get('/admin/roles/index', [RolesController::class, 'index'])->name('admin.roles.index');
Route::get('/admin/roles/tabla', [RolesController::class, 'tablaRoles']);
Route::get('/admin/roles/lista/permisos/{id}', [RolesController::class, 'vistaPermisos']);
Route::get('/admin/roles/permisos/tabla/{id}', [RolesController::class, 'tablaRolesPermisos']);
Route::post('/admin/roles/permiso/borrar', [RolesController::class, 'borrarPermiso']);
Route::post('/admin/roles/permiso/agregar', [RolesController::class, 'agregarPermiso']);
Route::get('/admin/roles/permisos/lista', [RolesController::class, 'listaTodosPermisos']);
Route::get('/admin/roles/permisos-todos/tabla', [RolesController::class, 'tablaTodosPermisos']);
Route::post('/admin/roles/borrar-global', [RolesController::class, 'borrarRolGlobal']);

// --- PERMISOS A USUARIOS ---

Route::get('/admin/permisos/index', [PermisoController::class, 'index'])->name('admin.permisos.index');
Route::get('/admin/permisos/tabla', [PermisoController::class, 'tablaUsuarios']);
Route::post('/admin/permisos/nuevo-usuario', [PermisoController::class, 'nuevoUsuario']);
Route::post('/admin/permisos/info-usuario', [PermisoController::class, 'infoUsuario']);
Route::post('/admin/permisos/editar-usuario', [PermisoController::class, 'editarUsuario']);
Route::post('/admin/permisos/nuevo-rol', [PermisoController::class, 'nuevoRol']);
Route::post('/admin/permisos/extra-nuevo', [PermisoController::class, 'nuevoPermisoExtra']);
Route::post('/admin/permisos/extra-borrar', [PermisoController::class, 'borrarPermisoGlobal']);

// --- PERFIL DE USUARIO ---
Route::get('/admin/editar-perfil/index', [PerfilController::class, 'indexEditarPerfil'])->name('admin.perfil');
Route::post('/admin/editar-perfil/actualizar', [PerfilController::class, 'editarUsuario']);

// --- SIN PERMISOS VISTA 403 ---
Route::get('sin-permisos', [ControlController::class, 'indexSinPermiso'])->name('no.permisos.index');

Route::get('/admin/dashboard', [DashboardController::class, 'vistaDashboard'])->name('admin.dashboard.index');

Route::get('/xml', [XmlController::class, 'mostrar']);


Route::group(['middleware' => ['auth']], function() {
    // Grupo de rutas para libros con prefijo y nombres
    Route::prefix('libros')->name('libros.')->group(function() {
        // Ruta para listado de libros (accesible para usuarios y admin)
        Route::get('/', [LibroController::class, 'index'])->name('index');

        // Rutas de creación (solo admin)
        Route::middleware('can:libros.create')->group(function() {
            Route::get('/crear', [LibroController::class, 'create'])->name('create');
            Route::post('/', [LibroController::class, 'store'])->name('store');
        });

        // Ruta para ver detalles (accesible para usuarios y admin)
        Route::get('/{libro}', [LibroController::class, 'show'])->name('show');

        // Rutas de edición (solo admin)
        Route::middleware('can:libros.edit')->group(function() {
            Route::get('/{libro}/editar', [LibroController::class, 'edit'])->name('edit');
            Route::put('/{libro}', [LibroController::class, 'update'])->name('update');
        });

        // Ruta de eliminación (solo admin)
        Route::delete('/{libro}', [LibroController::class, 'destroy'])
            ->middleware('can:libros.delete')
            ->name('destroy');
    });
});

Route::get('/clima', [ClimaController::class, 'index'])->name('clima.index');
