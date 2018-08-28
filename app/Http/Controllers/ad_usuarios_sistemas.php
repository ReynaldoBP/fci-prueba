<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;


/**
 * @property string $id_usuario
 * @property int $id_persona
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha_creacion
 * @property string $fecha_ultima_conexion
 * @property string $clave
 * @property string $id_persona
 * @property string $correo
 */
class ad_usuarios_sistemas extends Model
{
	public $timestamps =false;
	protected $primaryKey = 'id_usuario';
	protected $table = 'ad_usuarios_sistemas';

    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'estado', 'fecha_creacion', 'fecha_ultima_conexion', 'clave'];

}
