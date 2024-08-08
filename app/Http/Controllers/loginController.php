<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  // Corregido aquí
        $user->save();
        Auth::login($user);
        return redirect()->route('inicio.formlogin');  // Usar redirect en lugar de view
    }
    
    public function formRegister(){
        return view('home.register');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio.formlogin');
    }
    
    public function formlogin(){
        return view('home.login');
    }

    public function login(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            // Si la sesión corresponde a una empresa, puedes cargar la empresa asociada
            if (Auth::user()->empresa) {
                $empresa = Auth::user()->empresa;
                $request->session()->put('empresa_name', $empresa->Nombre);
            }
    
            return redirect()->intended(route('Event.index'));
        } else {
            $empresa = DB::table('empresas')
                ->where('email', $request->email)
                ->first();
    
            if ($empresa && $request->password == $empresa->Contrasena) {
                Auth::loginUsingId($empresa->id, $remember);
                $request->session()->regenerate();
                $request->session()->put('empresa_name', $empresa->Nombre);
                $request->session()->put('empresa_id', $empresa->id);
                $request->session()->put('empresa_email', $empresa->email);
                return redirect()->intended(route('cliente.index'));
            } else {
                return redirect()->route('inicio.formlogin');
            }
        }
    }


    /*
    public function login(Request $request){
        /*$credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('Event.index'));
        }else{
            return redirect()->route('inicio.formlogin');
        }
    }*/
}
