<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SugerenciasMailable;
use App\Models\bolsa;
use App\Models\home;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Metodo invoke
    |--------------------------------------------------------------------------
    |
    | Se ocupa cuando solo se usara un unico metodo
    |
    */
    public function __invoke()
    {
        /*return "Mensaje usando controlador";*/
        return view("home");
    }

    public function index()
    {
        $bolsainfo = bolsa::first();
        $homeinfo = home::first();
        return view('bolsa_trabajo.index', compact('bolsainfo', 'homeinfo'));
    }

    public function updateBolsaTrabajo(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'empresaLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $bolsaTrabajo = bolsa::first() ?: new bolsa();

        // Actualizar los campos
        $bolsaTrabajo->titulo = $request->titulo;
        $bolsaTrabajo->descripcion = $request->descripcion;

        // Si se sube un nuevo logo
        if ($request->hasFile('empresaLogo')) {
            $path = $request->file('empresaLogo')->store('logos', 'public');
            $bolsaTrabajo->logo = $path;
        }

        $bolsaTrabajo->save();

        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }

    // Método para actualizar los datos del Coordinador
    public function updateCoordinador(Request $request)
    {
        $request->validate([
            'tituloCoordinador' => 'required|string|max:255',
            'nombreCoordinador' => 'required|string|max:255',
            'mensajeCoordinador' => 'required|string',
            'coordinadorFoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $coordinador = home::first() ?: new home();

        // Actualizar los campos
        $coordinador->titulo = $request->tituloCoordinador;
        $coordinador->nombre = $request->nombreCoordinador;
        $coordinador->mensaje = $request->mensajeCoordinador;

        // Si se sube una nueva foto
        if ($request->hasFile('coordinadorFoto')) {
            $path = $request->file('coordinadorFoto')->store('coordinadores', 'public');
            $coordinador->foto = $path;
        }

        $coordinador->save();

        return redirect()->back()->with('success', 'Información del coordinador actualizada correctamente.');
    }

    public function questions(){
        return view('home.questions');
    }



    public function questionsP(Request $request){

        $Sugerencias = $request->sugerencia;
        /*return $sugerencias;*/

        $to = "deycek82@gmail.com";
        Mail::to($to)->send(new SugerenciasMailable($Sugerencias));
        return redirect()->route('index.sugerenciaseed');

        /*return view('home.questions');*/
    }

    public function sugerenciaseed(){
        return view('home.enviado');
    }
}
