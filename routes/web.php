<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\If_;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EventController;
use App\Models\Event;

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
/*
|--------------------------------------------------------------------------
| Controladores para el proyecto
|--------------------------------------------------------------------------
|
*/
Route::get("/", [EventController::class, "default"]) -> name('Event.default');
/*Perfil administrador*/
Route::get("inicio", [EventController::class, "index"]) -> name('Event.index');
/*Mostrar detalles de evento*/
Route::get("inicio/event/{id}", [EventController::class, "show"]) -> name('Event.show');
/*Formulario para actualizar evento*/
Route::get("inicio/event/update/{id}", [EventController::class, "update"]) -> name('Event.update');
/*nActualizar evento*/
Route::put("inicio/event/update/Process/{id}", [EventController::class, 'updateProcess'])->name('Event.updateProcess');
/*Eliminar evento*/
Route::delete("inicio/event/destroy/Process/{id}", [EventController::class, 'destroy'])->name('event.destroy');
/*Actualizar evento futuro*/
Route::get("inicio/event/soon/update/{id}", [EventController::class, "soonUpdate"]) -> name('Event.soonUpdate');
/*Ver horario de evento*/
Route::get("inicio/event/date/{id}", [EventController::class, "dates"]) -> name('Event.dates');
/*Eliminar horario para evento*/
Route::delete("inicio/event/date/destroy/Process/{id}", [EventController::class, 'destroyDate'])->name('event.destroyDate');
/*nuevo horario para evento formulario*/
Route::get("inicio/event/date/new/{id}", [EventController::class, "datesNew"]) -> name('date.new');
/*Agregar fecha*/
Route::put("inicio/event/newDate/Process/{id}", [EventController::class, 'newDateProcess'])->name('Event.newdateProcess');
/*Marcar evento como terminado*/
Route::put("inicio/event/finished/Process/{id}", [EventController::class, 'updatefinished'])->name('Event.updatefinished');







/*
|--------------------------------------------------------------------------
| pruebas
|--------------------------------------------------------------------------
|
*/
Route::get('cursos', function () {
    return "Bienvenido";
});

Route::get('cursos/create', function () {
    return "En esta pagina podras crear un curso";
    
});


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

/*Route::get('cursos/{variable}', function ($variable) {
    return "Bienvenido $variable";
});*/

Route::get('cursos/{curso}/{categoria?}', function ($curso,$categoria = null) {
    if($categoria){
        return  "Este curso es $curso con la categoria $categoria";

    }
    return "Bienvenido $curso";
});


/*
|--------------------------------------------------------------------------
| Uso de Controladores
|--------------------------------------------------------------------------
|
*/

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
