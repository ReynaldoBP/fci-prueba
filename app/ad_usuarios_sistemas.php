<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_usuario
 * @property int $id_persona
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha_creacion
 * @property string $fecha_ultima_conexion
 * @property string $clave
 * @property string $remember_token
 */
class ad_usuarios_sistemas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'estado', 'fecha_creacion', 'fecha_ultima_conexion', 'clave', 'remember_token'];

}
