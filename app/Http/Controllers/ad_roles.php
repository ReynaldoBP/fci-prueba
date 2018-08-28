<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class ad_roles extends Model
{
	protected $table = 'ad_roles';
	public $timestamps = false; 
	protected $primaryKey = 'id_rol';
	//pk poner



	protected $fillable = [
        'id_rol', 'descripcion', 'observacion','estado' //llenar esto
    ];



    public function crear($id_rol, $descripcion, $observacion, $estado){
	$ad_roles = new ad_roles;
	$ad_roles->id_rol = $id_rol;
	$ad_roles->descripcion = $descripcion;
	$ad_roles->observacion = $observacion;
	$ad_roles->estado = $estado;

	$ad_roles->save();
	echo 'creado artículo con id: ' . $ad_roles->id_rol;
}


public function borraId($id_rol){
	$ad_roles = ad_roles::find($id_rol);
	$articulo->delete();
}


public function muestraId($id_rol){
	$ad_roles = ad_roles::find($id_rol);
	echo $ad_roles->id_rol;
	echo '<br>';
	echo $ad_roles->descripcion;
	echo '<br>';
	echo $ad_roles->observacion;
	echo '<br>';
	echo $ad_roles->estado;
}

public function modificaId($id_rol, $descripcion, $observacion, $estado){
	$ad_roles = ad_roles::find($id_rol);
	$ad_roles->descripcion = $descripcion;
	$ad_roles->observacion = $observacion;
	$ad_roles->estado = $estado;
	$ad_usuarios_roles->save();
}

}
