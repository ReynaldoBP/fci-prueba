<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
  protected $table = 'parametros';
  protected $fillable = ['id_parametro','tipo_parametro','estado','valor_n1','valor_c1','descripcion'];
  protected $primaryKey = 'id_parametro';
  public $timestamps = false;
}
