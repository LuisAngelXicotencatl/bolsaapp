<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Nombres de las funciones sugeridos
    |--------------------------------------------------------------------------
    |
    | index para mostrar formulario principal
    | Create para agregar contenido
    | show para mostar contenido
    |
    */
    public function index(){
        /*return "Bienvenido a la pagina principal";*/
        $cursos =  Curso::orderBy('id', 'desc')->paginate/*all*/();
        /*return $curso;*/
        return view('cursos.index', compact('cursos'));
    }

    public function create(){
        /*return "En esta pagina podras crear un curso";*/
        return view('cursos.create');
    }

    public function show($id){
        /*return "Bienvenido $curso";*/
        $curso = Curso::find($id);
        /*return $curso;*/
        return view('cursos.show', compact('curso'));
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'avatar' => 'required'
        ]);
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->avatar = $request->avatar;
        $curso->save();
        return redirect()->route('cursps.show',$curso->id);
        /*return $curso;*/
        /*return $request->all();*/
    }

    public function edit($id){
        $id = Curso::find($id);
        /*return $curso;*/
        return view('cursos.edit', compact('id'));
    }


    public function update(UpdateCurso $request,Curso $id){
        /*return $request->all();*/

        /*$request->validate([
            'name' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'avatar' => 'required'
        ]);*/
        
        $id->name = $request->name;
        $id->descripcion = $request->descripcion;
        $id->avatar = $request->avatar;
        $id->save();
        // no nesesaria
        $newvalue = $id;//para verificar
        return redirect()->route('cursps.show',$newvalue->id);
        return $id;
    }

    public function destroy(Curso $id){
        $id->delete();
        return redirect()->route('cursps.index');
    }

}
