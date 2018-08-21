<div class="box-mantenimiento box-primary-mantenimiento col-xs-12">
                
                <div class="box-header-mantenimiento">
                  <h3 class="box-title-mantenimiento">Editar información del Parámetro</h3>
                </div>

<div id="notificacion_resul_feu"></div>



<form  id="f_editar_parametro"  method="post"  action="editar_parametro" class="form-horizontal form_entrada" >                
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
  <input type="hidden" name="id_parametro" value="<?= $parametro->id_parametro; ?>">              


  
<div class="form-group col-xs-6">
                      <label for="tipo_parametro">Tipo Parámetro*</label>
                      <input type="text" class="form-control" id="tipo_parametro" name="tipo_parametro"  value="<?= $parametro->tipo_parametro; ?>"  >
</div>
<div class="form-group col-xs-6">
                      <label for="estado">Estado</label>
                      <input type="text" class="form-control" id="estado" name="estado" value="<?= $parametro->estado; ?>" >
</div>


<div class="form-group col-xs-6">
                      <label for="valor_n1">Valor N1</label>
                      <input type="text" class="form-control" id="valor_n1" name="valor_n1" value="<?= $parametro->valor_n1; ?>"  >
</div>

<div class="form-group col-xs-6">
                      <label for="valor_c1">Valor C1</label>
                      <input type="text" class="form-control" id="valor_c1" name="valor_c1" value="<?= $parametro->valor_c1; ?>"  >
</div>
<div class="form-group col-xs-6">
                      <label for="descripcion">Descripción</label>
                      <textarea size="5" class="form-control" id="descripcion" name="descripcion" ><?= $parametro->descripcion; ?></textarea>
</div>






<div class="box-footer-mantenimiento col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
</div>


</form>

</div>


