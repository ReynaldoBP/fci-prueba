<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    //

    public function store(Request $request)
    {
    $fecha = new \DateTime();
    $persona = new pe_personas;
    $persona->id_persona = request()->id_us;
    $persona->nombres = request()->nombre_us;
    $persona->apellido = request()->apellido_us;
    $persona->nombres_completos = request()->id_us;
    $persona->id_tipo_identificacion = "CI";
    $persona->identificacion = request()->id_us;
    $persona->email = request()->Email_us;
    $persona->f_creacion = $fecha->format('d-m-Y H:i:s');
    //$persona->ad_usuarios_sistemas_id_usuario = "null";  //eliminado temporalmente en la BD
    $persona->save();
    return redirect('/admin/usuarios/lregistro'); // ruta especifica
    //return back(); //redirecciona atras

    //echo 'creado artículo con id: ' . $persona->id_persona;  // para un futuro
    //dd($persona->all());
    }
}
