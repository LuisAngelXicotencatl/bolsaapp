<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Date;
use App\Models\Event;
use App\Models\EventDate;
use App\Models\EventEmpresa;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaTomadaMail;
use App\Models\Dateprivate;
use App\Models\Empresa;
use App\Models\EventpDatep;
use App\Models\Eventprivate;

class ClienteController extends Controller
{
    public function index(){
        $empresaId = session('empresa_id');
        $privates =  Eventprivate::where('empresa', $empresaId)->orderBy('id', 'desc')->get();
        $events =  Event::with('images')->where('status', 1)->orderBy('id', 'desc')->get();
        $soons =  Event::where('status', 0)->orderBy('id', 'desc')->get();
        return view('clientes.index', compact('events', 'soons','privates'));
    }

    public function show($id){
        $event = Event::find($id);
        // Obtener las fechas del evento relacionadas donde el estado del evento es 0

        $eventEmpresa = EventEmpresa::with(['event', 'date','empresa'])
            ->where('event_id', $id)
            ->where('empresa_id', session('empresa_id')) // Filtra por la empresa en sesión
            ->first();
        /*return $eventEmpresa;*/

        $eventDates = EventDate::with(['event', 'date'])
            ->where('event_id', $id)
            ->whereHas('date', function($query) {
                $query->where('status', 0);
            })
            ->get();
        

        $eventDatestake = EventDate::with(['event', 'date'])
            ->where('event_id', $id)
            ->whereHas('date', function($query) {
                $query->where('status', 1);
            })
            ->get();

        return view('clientes.evento', compact('eventDates', 'event', 'eventDatestake','eventEmpresa'));
    }

    public function verCita($id) {
        $eventEmpresa = EventEmpresa::with(['event', 'date', 'empresa'])->find($id);
        /*return $eventEmpresa;*/
    
        $date = $eventEmpresa->date;
        $event = $eventEmpresa->event;

        /*return $date;*/
        /*return $event ;*/
    
        return view('clientes.vercita', compact('eventEmpresa', 'date', 'event'));
    }
    
    

    /*public function destroymicita(EventEmpresa $id){
        $date = EventEmpresa::find($id);


        $id->delete();
        return redirect()->route('cliente.index');
    }*/

    public function destroymicita(EventEmpresa $id) {
        $dateId = $id->date_id;
        /*return $dateId;*/
    
        $date = Date::find($dateId);
        if ($date) {
            $date->status = 0;
            $date->empresa = '';
            $date->save();
        }

        $id->delete();
    
        return redirect()->route('cliente.index');
    }

    public function eventshow ($id){
        /*return "Bienvenido $curso";*/
        $event = Event::find($id);

        $eventEmpresas = EventEmpresa::with(['event', 'empresa'])
            ->where('event_id', $id)
            ->get();

        $images =  Event::with('images')->where('id',$id )->orderBy('id', 'desc')->get();
        /*return $images;*/
        /*return $images;*/
        return view('clientes.show', compact('event', 'eventEmpresas', 'images'));
    }

    public function agendarcita(Request $request,Date $id){
        $id->empresa= $request->nameempresa;
        $id->status = 1;
        $id->save();

        $eventoEmpresa = new EventEmpresa();
        $eventoEmpresa -> empresa_id = $request->idempresa;
        $eventoEmpresa -> event_id = $request->idevent;
        $eventoEmpresa -> date_id = $id->id;
        $eventoEmpresa ->save();

        $newvalue = $request->idevent;


        /*Correo*/

        $event = Event::find($eventoEmpresa -> event_id);
        $date = Date::find($eventoEmpresa -> date_id);

        $idCorreo = $event ->id;
        $titulo = $event ->titulo;
        $fechaEvento = $event ->fecha;
        $lugar = $event ->lugar;
        $fechaCita = $date -> fecha;
        $hora = $date -> hora;
        $empresa = $date -> empresa;

        $to = "deycek82@gmail.com";
        Mail::to($to)->send(new CitaTomadaMail($idCorreo, $titulo,$fechaEvento,$lugar,$fechaCita,$hora,$empresa));
        return redirect()->route('cliente.show', $newvalue);
    }

    /***/
    public function showeventprivate($id){

        $event = Eventprivate::find($id);

        $empresaid = $event->empresa;

        $empresa = Empresa::find($empresaid);

        return view('clientes.showprivate', compact('event', 'empresa'));
    }

    public function newdateprivate($id){
        $event = Eventprivate::find($id);
        /*$EventDate = EventpDatep::where('eventprivate_id', $id)->orderBy('id', 'desc')->get();*/
        $EventDates = EventpDatep::with(['Eventprivate', 'Dateprivate'])
                ->where('eventprivate_id', $id)
                ->get();
        /*return $EventDate;*/
        return view('clientes.dateprivate', compact('event','EventDates'));
    }

    public function adddateprivateprocess(Request $request,Eventprivate $id){
        $dateprivate = new Dateprivate();
        $dateprivate->fecha = $request->fecha;
        $dateprivate->hora = $request->hora;
        $dateprivate->save();
        $iddate = $dateprivate->id;
        $idevent = $id->id;
        /*return $iddate;*/

        $eventdate = new EventpDatep();
        $eventdate->dateprivate_id = $iddate;
        $eventdate->eventprivate_id = $idevent;
        $eventdate->save();

        /*return $EventDate;*/
        return redirect()->route('cliente.Eventprivate.show' ,$idevent);
        /*return view('events.dateprivate', compact('event','EventDates'));*/
    }

    public function destroyDateprivate(Request $request, EventpDatep $eventDatep)
    {
        $eventDatep->delete();
        
        $dateprivate = Dateprivate::where('id', $request->dateid)->first();
        if ($dateprivate) {
            $dateprivate->delete();
        }

        $eventid = $request->eventid;

        // Redirigir a la ruta correspondiente después de la eliminación
        return redirect()->route('cliente.Eventprivate.show' ,$eventid);
    }

    public function updateeventprivate($id){
        $event = Eventprivate::find($id);
        return view('clientes.updateeventprivate', compact('event'));
    }

    public function Eventprivateupdateevent(Request $request, Eventprivate $id){
        $id->titulo = $request->titulo;
        $id->subtitulo = $request->subtitulo;
        $id->descripcion = $request->descripcion;
        $id->save();
        
        return redirect()->route('cliente.Eventprivate.show', $id->id);
    }
}
