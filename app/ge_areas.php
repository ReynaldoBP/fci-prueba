<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_area
 * @property string $id_localidad
 * @property string $descripcion
 * @property string $ge_localidades_id_provincia
 */
class Ge_areas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'ge_localidades_id_provincia'];

}
