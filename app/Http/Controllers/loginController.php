<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
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

    public function logoutEm(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio.formloginEmpresa');
    }
    public function formlogin(){
        return view('home.login');
    }

    public function formloginempresa(){
        return view('home.loginempresa');
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
    public function loginEmpresa(Request $request)
    {
    $credentials = [
        "email" => $request->email,
        "contrasena" => $request->password,
    ];
    $remember = $request->has('remember');

    // Intentar autenticar al usuario en la tabla `empresas`
    $empresa = Empresa::where('email', $credentials['email'])->first();

    // Verificar la contraseña sin hash
    if ($empresa && $credentials['contrasena'] === $empresa->contrasena) {
        Auth::login($empresa, $remember);

        // Guardar el nombre de la empresa y el ID en la sesión
        $request->session()->put('empresa_name', $empresa->nombre);
        $request->session()->put('empresa_id', $empresa->id);
        $request->session()->put('empresa_email', $empresa->email);

        $request->session()->regenerate();
        return redirect()->intended(route('cliente.index'));
    } else {
        return redirect()->route('inicio.formloginempresa')->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    }


    /**/
    public function APIregister(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
    
        Auth::login($user);
    
        return response()->json([
            'message' => 'Registro exitoso y usuario autenticado',
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ], 201);
    }

    public function APIlogin(Request $request) {
        // Validación de credenciales
        $credentials = $request->only('email', 'password');

        // Intento de autenticación
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Retornar respuesta JSON con el token y detalles del usuario
        return response()->json([
            'message' => 'Login exitoso',
            'user' => $user,
            'id' => $user->id,
            'token' => $user->createToken('API Token')->plainTextToken,
        ], 200);
    }
    

    /*public function APIlogin(Request $request) {
        // Validación de credenciales
        $credentials = $request->only('email', 'password');

        // Intento de autenticación
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Generar token de API usando Sanctum
        $token = "jnfjnjdfnksdj";

        // Retornar respuesta JSON con el token y detalles del usuario
        return response()->json([
            'message' => 'Login exitoso',
            'user' => $user,
            'token' => $token,
        ], 200);
    }*/
}
