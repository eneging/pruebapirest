<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()  {
        return Usuario::all();
        
    }


    public function show($id){
       
       
            $usuarios = Usuario::find($id);
            return response()->json($usuarios);
     
         
    }
  
    public function store(Request $request){
        try {
            $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo_electronico = $request->correo_electronico;
        $usuario->fecha_registro = $request->fecha_registro;
        $usuario->save();

        } catch (\Throwable $th) {
           return $th->getMessage();
        }
       
        return "creado";
    }

    public function update(Request $request, $id){

        try {

            $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo_electronico = $request->correo_electronico;
        $usuario->fecha_registro = $request->fecha_registro;
        $usuario->save();
         
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return "actualizado Correctamente";
    }
  

public function delete($id){
    $usuario = Usuario::find($id);
    $usuario->delete();
    return "usuario Eliminado";
}

}
