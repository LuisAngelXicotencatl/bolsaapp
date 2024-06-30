<?php

namespace App\Http\Controllers;

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
        return redirect()->route('Event.index',$newvalue->id);
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
        $event = Event::find($id);
        $eventDates = EventDate::with(['event', 'date'])
            ->where('event_id', $id)
            ->whereHas('event', function ($query) {
                $query->where('status', 0);
            })
            ->get();
        return view('events.dates', compact('eventDates','event'));
        return $eventDates;
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
    
}

