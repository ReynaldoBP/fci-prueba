<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;


class pe_personas extends Model //
{
    //
public $timestamps =false;
protected $primaryKey = 'id_persona';
protected $table = 'pe_personas';
protected $BD='lesstrafic';

 public function personas()
    {
        return $this->belongsTo('App\Http\Controllers\ad_usuarios_sistemas', 'id_usuario');
    }

/*public function guardar_pe(){

	alert("hi");
    $persona = new pe_personas;
    $persona->id_persona = "2";
    $persona->nombres = "$('#id_us').val()";
    $persona->apellido = "$('#id_us').val()";
    $persona->nombres_completos = "$('#id_us').val()";
    $persona->id_tipo_identificacion = "2";
    $persona->identificacion = "$('#id_us').val()";
    $persona->ad_usuarios_sistemas_id_usuarios = "1";

    $persona->save();

    alert('listo');
}*/

}
