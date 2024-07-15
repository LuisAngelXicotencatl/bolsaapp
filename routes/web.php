<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\If_;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\loginController;
use App\Models\Empresa;
use App\Models\Event;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('storage-link', function () {
    try {
        if (file_exists(public_path('storage'))) {
            return 'El directorio "public/storage" ya existe.';
        }

        Artisan::call('storage:link');

        return 'El directorio [public/storage] ha sido enlazado.';
    } catch (\Exception $e) {
        return 'Ocurrió un error: ' . $e->getMessage();
    }
});
/*
|--------------------------------------------------------------------------
| Controladores para el proyecto
|--------------------------------------------------------------------------
|
*/
Route::get("/", [EventController::class, "default"]) -> name('Event.default');
/*Perfil administrador*/
Route::get("inicio/Administrador/", [EventController::class, "index"]) -> name('Event.index')->middleware('auth');
/*Mostrar detalles de evento*/
Route::get("inicio/Administrador/event/{id}", [EventController::class, "show"]) -> name('Event.show')->middleware('auth');;
/*Formulario para actualizar evento*/
Route::get("inicio/Administrador/event/update/{id}", [EventController::class, "update"]) -> name('Event.update')->middleware('auth');
/*nActualizar evento*/
Route::put("inicio/Administrador/event/update/Process/{id}", [EventController::class, 'updateProcess'])->name('Event.updateProcess')->middleware('auth');
/*Eliminar evento*/
Route::delete("inicio/Administrador/event/destroy/Process/{id}", [EventController::class, 'destroy'])->name('event.destroy')->middleware('auth');
/*Actualizar evento futuro*/
Route::get("inicio/Administrador/event/soon/update/{id}", [EventController::class, "soonUpdate"]) -> name('Event.soonUpdate')->middleware('auth');
/*Ver horario de evento*/
Route::get("inicio/Administrador/event/date/{id}", [EventController::class, "dates"]) -> name('Event.dates')->middleware('auth');
/*Eliminar horario para evento*/
Route::delete("inicio/Administrador/event/date/destroy/Process/{id}", [EventController::class, 'destroyDate'])->name('event.destroyDate')->middleware('auth');
/*nuevo horario para evento formulario*/
Route::get("inicio/Administrador/event/date/new/{id}", [EventController::class, "datesNew"]) -> name('date.new')->middleware('auth');
/*Agregar fecha*/
Route::put("inicio/Administrador/event/newDate/Process/{id}", [EventController::class, 'newDateProcess'])->name('Event.newdateProcess')->middleware('auth');
/*Marcar evento como terminado*/
Route::put("inicio/Administrador/event/finished/Process/{id}", [EventController::class, 'updatefinished'])->name('Event.updatefinished')->middleware('auth');
/*Nuevo evento*/
Route::get("inicio/Administrador/event/nuevo/evento", [EventController::class, "nuevoEvento"])->name('Event.nuevoEvento')->middleware('auth');
/*Agregar nuevo evento*/
Route::put("inicio/Administrador/event/nuevo/eventoProcess", [EventController::class, 'nuevoEventoProcess'])->name('Event.nuevoEventoProcess')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Empresas
|--------------------------------------------------------------------------
*/
Route::get("Empresas", [EmpresaController::class, "index"]) -> name('Empresa.index')->middleware('auth');
Route::get("Empresas/Administrador/agregar", [EmpresaController::class, "agregar"]) -> name('Empresa.new')->middleware('auth');
Route::put("inicio/Administrador/agregar/Process", [EmpresaController::class, 'agregarEmpresaProcess'])->name('Empresa.agregarProcess')->middleware('auth');
/*Route::delete("Empresas/show/destroy/Process/{id}", [EmpresaController::class, 'destroyImage'])->name('Event.destroyImage');*/
Route::delete('Empresas/Administrador/show/destroy/Process/{id}/{image}', [EmpresaController::class, 'destroyImage'])->name('Event.destroyImage')->middleware('auth');
/*Agregar imagen */
Route::post('inicio/Administrador/imagenagregar/Process', [EmpresaController::class, 'store'])->name('images.store')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get("inicio/Administrador/default/event/{id}", [EmpresaController::class, "show"]) -> name('Event.indexshow');
/*
|--------------------------------------------------------------------------
| gegistro
|--------------------------------------------------------------------------
*/
Route::get("inicio/Administrador/register", [loginController::class, "formRegister"])->name('inicio.registerForm');
Route::post('inicio/Administrador/register/process', [loginController::class, 'register'])->name('inicio.register');
Route::get("inicio/Administrador/login", [loginController::class, "formlogin"])->name('inicio.formlogin');
Route::post('inicio/Administrador/login/process', [loginController::class, 'login'])->name('inicio.login');
Route::get("inicio/Administrador/exit", [loginController::class, "logout"])->name('inicio.logout');









































/*
|--------------------------------------------------------------------------
| Rutas similares
|--------------------------------------------------------------------------
|
| Las rutas se leeran de ariba hacia abajo por lo que si exite un subgrupo como curso/create y no lo detecte como variable
| solo se pone primero
| Si una variable no sible se llenara se podra poner ? al final de la variable
|
*/

Route::get('cursos', function () {
    return "Bienvenido";
});

Route::get('cursos/create', function () {
    return "En esta pagina podras crear un curso";
    
});

Route::get('controlador', HomeController::class);

Route::get("controladorcurso", [CursoController::class, "index"]) -> name('cursps.index');
Route::get("controladorcurso/create", [CursoController::class, "create"]) -> name('cursps.create');
Route::get("controladorcurso/{id}", [CursoController::class, "show"]) -> name('cursps.show');
Route::Post("cursos", [CursoController::class, 'store'])->name('cursos.store');
Route::get("cursosE/{id}/edit", [CursoController::class, 'edit'])->name('cursos.edit');
Route::put("cursosProceso/{id}", [CursoController::class, 'update'])->name('cursos.update');
Route::delete("cursoProceso/{id}", [CursoController::class, 'destroy'])->name('curso.destroy');

/*Route::controller(CursoController::class)->group(function(){
    Route::get("controladorcurso", "index");
    Route::get("controladorcurso/create", "create");
    Route::get("controladorcurso/{curso}", "show");
});*/
