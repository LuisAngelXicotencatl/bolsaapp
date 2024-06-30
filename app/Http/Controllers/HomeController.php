<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
