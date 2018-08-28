<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ad_usuarios_sistemasController extends Controller
{
    //

    public function store(Request $request)
    {
    	$ad_us_sist = new AD_USUARIOS_SISTEMAS;
    	$ad_us_sist->id_usuario = request()->id_us;
    	$ad_us_sist->descripcion = request()->nombre_us;
    	$ad_us_sist->estado = request()->apellido_us;
    	$ad_us_sist->fecha_creacion = request()->id_us;
    	$ad_us_sist->fecha_ultima_conexion = "CI";
    	$ad_us_sist->clave = request()->id_us;
    	$ad_us_sist->id_persona = request()->id_us;
    //$persona->ad_usuarios_sistemas_id_usuario = "null";  //eliminado temporalmente en la BD
    	$ad_us_sist->save();

    
    return redirect('/admin/usuarios/lregistro'); // ruta especifica
    //return back(); //redirecciona atras

    //echo 'creado artículo con id: ' . $persona->id_persona;
    //dd($persona->all());
    }

}
