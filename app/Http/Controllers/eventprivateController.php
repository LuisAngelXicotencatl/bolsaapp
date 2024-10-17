<?php

namespace App\Http\Controllers;

use App\Models\bolsa;
use App\Models\Empresa;
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
        // Obtener los IDs
        $dateId = $newevent->id;
        
        return $newevent;
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
}
