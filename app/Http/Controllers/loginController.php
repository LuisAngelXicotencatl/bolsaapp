<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('Event.index'));
        }else{
            return redirect()->route('inicio.formlogin');
        }
    }
}
