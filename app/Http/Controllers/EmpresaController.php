<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Event;
use App\Models\EventEmpresa;
use App\Models\EventImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class EmpresaController extends Controller
{
    public function index(){
        $empresas =  Empresa::orderBy('id', 'desc')->get();
        return view('empresas.index', compact('empresas'));
    }

    public function agregar(){
        return view('empresas.new');
    }

    /*public function agregarEmpresaProcess(Request $request)
    {
        $egregar = new Empresa();
        $egregar ->Nombre = $request->nombre;
        $egregar ->Descripcion = $request->descripcion;
        $egregar->Email = strtolower(str_replace(' ', '.', $request->nombre)) . '@fcc_vinculacion.com';
        $egregar->Contrasena = Str::random(10);
        $egregar ->save();
        $empresas =  Empresa::orderBy('id', 'desc')->get();
        return view('empresas.index', compact('empresas'));
    }*/


    public function agregarEmpresaProcess(Request $request)
    {
    $egregar = new Empresa();
    $egregar->Nombre = $request->nombre;
    $egregar->Descripcion = $request->descripcion;
    $egregar->Email = strtolower(str_replace(' ', '.', $request->nombre)) . '_vinculacion';

    $plainPassword = Str::random(10);
    $egregar->Contrasena = $plainPassword;

    $egregar->save();

    $empresas = Empresa::orderBy('id', 'desc')->get();

    return view('empresas.index', compact('empresas'));
    }



    /*public function destroyImage($eventId, $imageId) {
    $image = Image::findOrFail($imageId);
    $image->delete();
    $event = Event::findOrFail($eventId);
    $eventEmpresas = EventEmpresa::with(['event', 'empresa'])
        ->where('event_id', $eventId)
        ->get();
    $images = Event::with('images')->where('id', $eventId)->orderBy('id', 'desc')->firstOrFail();
    return view('events.show', compact('event', 'eventEmpresas', 'images'));
    }*/


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        if (!$imagePath) {
            return back()->with('error', 'Tipo de archivo es incorrecto');
        }

        $image = new Image();
        $image->image = $imagePath;
        $image->save();

        $imageid= $image->id;
        $eventImaage = new EventImage();
        $eventImaage->image_id = $imageid;
        $eventImaage->event_id = $request->event;
        $eventImaage->save();
        /*return $eventImaage;*/

        $event = Event::findOrFail($request->event);
        $eventEmpresas = EventEmpresa::with(['event', 'empresa'])
            ->where('event_id', $request->event)
            ->get();
        $images = Event::with('images')->where('id', $request->event)->orderBy('id', 'desc')->firstOrFail();
        return view('events.show', compact('event', 'eventEmpresas', 'images'));
    }

    public function destroyImage($eventId, $imageId)
    {
    $image = Image::findOrFail($imageId);
    $image->delete();
    Storage::disk('public')->delete($image->image);
    $event = Event::findOrFail($eventId);
    $eventEmpresas = EventEmpresa::with(['event', 'empresa'])
        ->where('event_id', $eventId)
        ->get();
    $images = Event::with('images')->where('id', $eventId)->orderBy('id', 'desc')->firstOrFail();
    return view('events.show', compact('event', 'eventEmpresas', 'images'));
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
        return view('home.event', compact('event', 'eventEmpresas', 'images'));
    }

    public function EmpresaInfon($id){
        $empresa = Empresa::find($id);
        return view('empresas.show', compact('empresa'));
    }

    public function destroyempresa(Empresa $id){
        $id->delete();
        return redirect()->route('Empresa.index');
    }
}
