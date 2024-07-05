<?php

namespace App\Http\Controllers;

use App\Http\Requests\addDate;
use App\Http\Requests\UpdateEvent;
use App\Models\Date;
use App\Models\Event;
use App\Models\EventDate;
use Illuminate\Http\Request;

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
        /*return $event;*/
        return view('events.show', compact('event'));
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

    /*public function newDateProcess(addDate $request,Date $id){
        $newevent = new Date();
        $newevent->fecha = $request->fecha;
        $newevent->hora = $request->hora;
        $newevent->status = 0;
        $newevent->save();

        $dateId = $newevent->id;
        $eventId = $id;

        $eventDate = new EventDate();
        $eventDate->date_id = $dateId;
        $eventDate->event_id = $eventId;
        $eventDate->save();
        return redirect()->route('Event.dates', $eventId);
        return $id;
    }*/
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
}

