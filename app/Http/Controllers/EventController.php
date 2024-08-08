<?php

namespace App\Http\Controllers;

use App\Http\Requests\addDate;
use App\Http\Requests\UpdateEvent;
use App\Models\Date;
use App\Models\Event;
use App\Models\EventDate;
use App\Models\EventEmpresa;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class EventController extends Controller
{
    public function index(){
        $events =  Event::with('images')->where('status', 1)->orderBy('id', 'desc')->get();
        $soons =  Event::where('status', 0)->orderBy('id', 'desc')->get();
        return view('events.index', compact('events', 'soons'));
    }

    public function default(){
        $events =  Event::with('images')->where('status', 1)->orderBy('id', 'desc')->get();
        return view('home.index', compact('events'));
    }

    public function show($id){
        /*return "Bienvenido $curso";*/
        $event = Event::find($id);

        $eventEmpresas = EventEmpresa::with(['event', 'empresa'])
            ->where('event_id', $id)
            ->get();

        $images =  Event::with('images')->where('id',$id )->orderBy('id', 'desc')->get();
        /*return $images;*/
        /*return $images;*/
        return view('events.show', compact('event', 'eventEmpresas', 'images'));
    }
    public function update($id){
        $event = Event::find($id);
        return view('events.update', compact('event'));
    }
    public function updateProcess(UpdateEvent $request,Event $id){
        $id->titulo = $request->titulo;
        $id->subtitulo = $request->subtitulo;
        $id->descripcion = $request->descripcion;
        $id->fecha = $request->fecha;
        $id->lugar = $request->lugar;
        $id->premio = $request->premio;
        $id->save();
        // no nesesaria
        $newvalue = $id;//para verificar
        return redirect()->route('Event.show',$newvalue->id);
        /*return $id;*/
    }

    public function destroy(Event $id){
        $id->delete();
        return redirect()->route('Event.index');
    }

    public function soonUpdate($id){
        $event = Event::find($id);
        return view('events.soonUpdate', compact('event'));
    }

    public function dates($id){
        // Encontrar el evento por su ID
        $event = Event::find($id);
        
        // Obtener las fechas del evento relacionadas donde el estado del evento es 0
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

        return view('events.dates', compact('eventDates', 'event', 'eventDatestake'));
    }
    
    
    public function destroyDate($id){
        $date = Date::find($id);
        if ($date) {
            $eventId = $date->eventDates->first()->event_id;
            $date->delete();
            
            $event = Event::find($eventId);
            $eventDates = EventDate::with(['event', 'date'])
                ->where('event_id', $eventId)
                ->get();
            
            return redirect()->route('Event.dates', $eventId)->with(compact('eventDates', 'event'));
        }
        
        return redirect()->route('Event.index')->withErrors('La fecha no existe.');
    }
    public function datesNew($id){
        $event = Event::find($id);
        return view('events.newdate', compact('event'));
    }


    public function newDateProcess(addDate $request, $id)
    {
        // Crear una nueva instancia de Date
        $newevent = new Date();
        $newevent->fecha = $request->fecha;
        $newevent->hora = $request->hora;
        $newevent->status = 0;

        $newevent->save();

        // Obtener los IDs
        $dateId = $newevent->id;
        $eventId = $id;

        // Crear una nueva instancia de EventDate y asociarla con el evento
        $eventDate = new EventDate();
        $eventDate->date_id = $dateId;
        $eventDate->event_id = $eventId;
        $eventDate->save();
        
        return redirect()->route('Event.dates', $eventId);
    }

    public function updatefinished(Event $id){
        $id->status = 1;
        $id->save();
        $newid = $id;
        return redirect()->route('Event.update', $newid->id);
        /*return $id;*/
    }

    public function nuevoEvento(){
        return view('events.newEvent');
    }



    public function nuevoEventoProcess(UpdateEvent $request)
    {
        // Crear una nueva instancia de Date
        $newevent = new Event();
        $newevent ->titulo = $request->titulo;
        $newevent ->subtitulo = $request->subtitulo;
        $newevent ->descripcion = $request->descripcion;
        $newevent ->fecha = $request->fecha;
        $newevent ->lugar = $request->lugar;
        $newevent ->status = 0;
        $newevent->save();
        // Obtener los IDs
        $dateId = $newevent->id;
        
        return redirect()->route('Event.dates', $dateId);
    }


    public function updateDate($id){
        $date = Date::where('id', $id)
        ->first();
        /*return $Dates;*/

        return view('events.updatedate', compact('date'));
    }

    public function updateDateprocess(Request $request, Date $id){
        $id->fecha = $request->fecha;
        $id->hora = $request->hora;
        $id->save();
        /*return $id->id;*/

        $event = EventDate::where('date_id', $id->id)->first();

        $idEvent = $event->event_id;
        /*return $idEvent;*/
        return redirect()->route('Event.dates', $idEvent);
    }
}

