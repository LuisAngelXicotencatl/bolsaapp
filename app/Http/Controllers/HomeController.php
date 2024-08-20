<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SugerenciasMailable;

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
