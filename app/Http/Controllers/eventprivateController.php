<?php

namespace App\Http\Controllers;

use App\Models\bolsa;
use App\Models\Dateprivate;
use App\Models\Empresa;
use App\Models\EventpDatep;
use App\Models\Eventprivate;
use App\Models\home;
use Illuminate\Http\Request;

class eventprivateController extends Controller
{
    public function nuevoEventoprivate(Request $request)
    {
        // Crear una nueva instancia de Date
        $newevent = new Eventprivate();
        $newevent ->titulo = $request->titulo;
        $newevent ->subtitulo = $request->subtitulo;
        $newevent ->descripcion = $request->descripcion;
        $newevent ->fecha = $request->fecha;
        $newevent ->lugar = $request->lugar;
        $newevent ->status = 0;
        $newevent ->empresa = $request->empresa;
        $newevent->save();
        return redirect()->route('Eventprivate.show', $newevent->id);

        /*return $newevent;*/
    }

    public function nuevoEventoprivateform(){
        $empresas = Empresa::select('id', 'nombre')->orderBy('id', 'desc')->get();
        /*return $empresas;*/
        return view('events.eventprivate', compact('empresas'));
    }


    public function show($id){
        /*return "Bienvenido $curso";*/
        $event = Eventprivate::find($id);
        /*return $event;*/
        $empresaid = $event->empresa;
        /*return $empresaid;*/
        $empresa = Empresa::find($empresaid);

        // Verificar si se encontró la empresa
        if ($empresa) {
            return view('events.showprivate', compact('event', 'empresa'));
        } else {
            $empresa->Nombre = 'No encontrada';
            return view('events.showprivate', compact('event', 'empresa'));
        }
    }

    public function editindex(){
        $bolsainfo = bolsa::first();
        $homeinfo = home::first();

        return view('events.edithome', compact('bolsainfo', 'homeinfo'));
    }

    public function destroyeventprivate(Eventprivate $id){
        $id->delete();
        return redirect()->route('Event.index');
    }

    public function updateeventprivate($id){
        $event = Eventprivate::find($id);
        $empresas = Empresa::select('id', 'nombre')->orderBy('id', 'desc')->get();
        return view('events.updateeventprivate', compact('event','empresas'));
    }

    public function Eventprivateupdateevent(Request $request, Eventprivate $id){
        $id->titulo = $request->titulo;
        $id->subtitulo = $request->subtitulo;
        $id->descripcion = $request->descripcion;
        $id->fecha = $request->fecha;
        $id->lugar = $request->lugar;
        $id->empresa = $request->empresa;
        $id->save();
        
        return redirect()->route('Eventprivate.show', $id->id);
    }

    public function newdateprivate($id){
        $event = Eventprivate::find($id);
        /*$EventDate = EventpDatep::where('eventprivate_id', $id)->orderBy('id', 'desc')->get();*/
        $EventDates = EventpDatep::with(['Eventprivate', 'Dateprivate'])
                ->where('eventprivate_id', $id)
                ->get();
        /*return $EventDate;*/
        return view('events.dateprivate', compact('event','EventDates'));
    }

    public function newdateprivateprocess(Request $request,Eventprivate $id){
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

        
        $event = Eventprivate::find($idevent);
        $EventDates = EventpDatep::with(['Eventprivate', 'Dateprivate'])
                ->where('eventprivate_id', $id)
                ->get();
        /*return $EventDate;*/
        return redirect()->route('Eventprivate.show' ,$idevent);
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
        return redirect()->route('Eventprivate.show' ,$eventid);
    }

}
