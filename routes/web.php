<?php
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\If_;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\eventprivateController;
use App\Http\Controllers\VideoCallController;
use App\Models\Empresa;
use App\Models\Event;
use App\Models\home;
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


/*Inicio*/
Route::get('/', function () {
    return view('home.index');
});

/*Generar carpeta */
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
| Administrador
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
/*actualizar horario*/
Route::get("inicio/Administrador/event/updatedate/date/{id}", [EventController::class, "updateDate"]) -> name('event.updateDate')->middleware('auth');
/*actualizar horarioproceso*/
Route::put("inicio/Administrador/event/updatedateprocess/date/{id}", [EventController::class, "updateDateprocess"]) -> name('Event.updateDateprocess')->middleware('auth');
/*Agregar fecha*/
Route::put("inicio/Administrador/event/newDate/Process/{id}", [EventController::class, 'newDateProcess'])->name('Event.newdateProcess')->middleware('auth');
/*Marcar evento como terminado*/
Route::put("inicio/Administrador/event/finished/Process/{id}", [EventController::class, 'updatefinished'])->name('Event.updatefinished')->middleware('auth');
/*Nuevo evento*/
Route::get("inicio/Administrador/event/nuevo/evento", [EventController::class, "nuevoEvento"])->name('Event.nuevoEvento')->middleware('auth');
/*Agregar nuevo evento*/
Route::put("inicio/Administrador/event/nuevo/eventoProcess", [EventController::class, 'nuevoEventoProcess'])->name('Event.nuevoEventoProcess')->middleware('auth');
Route::get('/evento/{id}/export', [EventController::class, 'export'])->name('event.export');
/*Empresa*/
Route::get("Empresas", [EmpresaController::class, "index"]) -> name('Empresa.index')->middleware('auth');
Route::get("Empresas/Administrador/agregar", [EmpresaController::class, "agregar"]) -> name('Empresa.new')->middleware('auth');
Route::put("inicio/Administrador/agregar/Process", [EmpresaController::class, 'agregarEmpresaProcess'])->name('Empresa.agregarProcess')->middleware('auth');
/*Route::delete("Empresas/show/destroy/Process/{id}", [EmpresaController::class, 'destroyImage'])->name('Event.destroyImage');*/
Route::delete('Empresas/Administrador/show/destroy/Process/{id}/{image}', [EmpresaController::class, 'destroyImage'])->name('Event.destroyImage')->middleware('auth');
/*Agregar imagen */
Route::post('inicio/Administrador/imagenagregar/Process', [EmpresaController::class, 'store'])->name('images.store')->middleware('auth');
/*Retornar informacion de nueva empresa*/
Route::get("Empresas/Administrador/newEmpresa/agregar/show/{id}", [EmpresaController::class, "EmpresaInfon"]) -> name('EmpresaInfon')->middleware('auth');
/***/
Route::delete('Empresas/Administrador/Empresa/delete/show/{id}', [EmpresaController::class, 'destroyempresa'])->name('destroyempresa')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get("inicio/Administrador/default/event/{id}", [EmpresaController::class, "show"]) -> name('Event.indexshow');
Route::get("inicio/questions", [HomeController::class, "questions"]) -> name('index.questions');
Route::Post("inicio/questions/process", [HomeController::class, "questionsP"]) -> name('index.questionsP');
Route::get("inicio/sugerencia", [HomeController::class, "sugerenciaseed"]) -> name('index.sugerenciaseed');
/*Modificar inicio */
Route::put('/coordinador/update', [HomeController::class, 'updateCoordinador'])->name('updateCoordinador');
Route::put('/bolsa-trabajo/update', [HomeController::class, 'updateBolsaTrabajo'])->name('updateBolsaTrabajo');

/*
|--------------------------------------------------------------------------
| registro
|--------------------------------------------------------------------------
*/
/*Route::get("inicio/Administrador/register", [loginController::class, "formRegister"])->name('inicio.registerForm');
Route::post('inicio/Administrador/register/process', [loginController::class, 'register'])->name('inicio.register');*/
Route::get("inicio/Administrador/login", [loginController::class, "formlogin"])->name('inicio.formlogin');
Route::get("inicio/cliente/login", [loginController::class, "formloginempresa"])->name('inicio.formloginempresa');
Route::post('inicio/Administrador/login/process', [loginController::class, 'login'])->name('inicio.login');
Route::post('inicio/Administrador/loginempresa/process', [loginController::class, 'loginEmpresa'])->name('inicio.loginEmpresa');
Route::get("inicio/Administrador/exit", [loginController::class, "logout"])->name('inicio.logout');
Route::get("inicio/cliente/exit", [loginController::class, "formloginempresa"])->name('inicio.logoutEmpresa');
/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/
Route::get("inicio/cliente/index", [ClienteController::class, "index"])->name('cliente.index');
Route::get("inicio/cliente/event/{id}", [ClienteController::class, "show"])->name('cliente.show');
Route::get("inicio/cliente/event/info/{id}", [ClienteController::class, "eventshow"]) -> name('cliente.eventshow');
Route::post('inicio/cliente/event/Agendarcita/{id}', [ClienteController::class, 'agendarcita'])->name('agendarcita');
Route::get('inicio/cliente/event/vercita/{id}', [ClienteController::class, 'verCita'])->name('vercita');
Route::delete('inicio/cliente/event/vercita/delete/{id}', [ClienteController::class, 'destroymicita'])->name('destroymicita');

/*
|--------------------------------------------------------------------------
| Event privates
|--------------------------------------------------------------------------
|
*/
Route::put("inicio/Administrador/eventprivate/nuevo/eventoprivateProcess", [eventprivateController::class, 'nuevoEventoprivate'])->name('Eventprivate.nuevoEventoproces')->middleware('auth');
/*Nuevo evento*/
Route::get("inicio/Administrador/eventprivate/nuevo/eventoprivate", [eventprivateController::class, "nuevoEventoprivateform"])->name('Eventprivate.nuevoEvento')->middleware('auth');
/*Mostrar detalles de evento*/
Route::get("inicio/Administrador/eventprivate/{id}", [eventprivateController::class, "show"]) -> name('Eventprivate.show')->middleware('auth');
Route::get("inicio/Administrador/homeedit", [eventprivateController::class, "editindex"]) -> name('Eventprivate.editindex')->middleware('auth');
Route::delete('inicio/Administrador/eventprivat/delete/{id}', [eventprivateController::class, 'destroyeventprivate'])->name('destroyeventprivate')->middleware('auth');
Route::get("inicio/Administrador/eventprivat/editevent/{id}", [eventprivateController::class, "updateeventprivate"])->name('Eventprivate.updateeventprivate')->middleware('auth');
Route::put("inicio/Administrador/eventprivat/updateEvent/{id}", [eventprivateController::class, "Eventprivateupdateevent"]) -> name('Eventprivate.updateevent')->middleware('auth');
Route::get("inicio/Administrador/eventprivate/date/{id}", [eventprivateController::class, "newdateprivate"]) -> name('Eventprivate.privatenewdate')->middleware('auth');
Route::put("inicio/Administrador/eventprivat/newdateprivateprocess/{id}", [eventprivateController::class, "newdateprivateprocess"]) -> name('Eventprivate.newdateprivateprocess')->middleware('auth');
Route::delete('inicio/Administrador/eventprivat/deleteeventprivate/{id}', [eventprivateController::class, 'destroyDateprivate'])->name('eventprivate.destroyDateprivate')->middleware('auth');


/*Cliente show*/
Route::get("inicio/cliente/eventprivate/{id}", [ClienteController::class, "showeventprivate"]) -> name('cliente.Eventprivate.show');
Route::get("inicio/cliente/eventprivate/editedate/{id}", [ClienteController::class, "newdateprivate"])->name('cliente.Eventprivateform.update');
Route::put("inicio/cliente/eventprivate/updateEvent/{id}", [ClienteController::class, "adddateprivateprocess"]) -> name('cliente.Eventprivateprocess.update');
Route::delete('inicio/cliente/eventprivate/deleteeventprivate/{id}', [ClienteController::class, 'destroyDateprivate'])->name('cliente.destroyDateprivate');


Route::get("inicio/cliente/eventprivate/editeventform/{id}", [ClienteController::class, "updateeventprivate"])->name('cliente.editeventform');
Route::put("inicio/cliente/eventprivate/updateEventprocess/{id}", [ClienteController::class, "Eventprivateupdateevent"]) -> name('cliente.updateEventprocess');
