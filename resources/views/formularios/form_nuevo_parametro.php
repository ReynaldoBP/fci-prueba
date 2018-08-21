<div class="box-mantenimiento box-primary-mantenimiento col-xs-12">
                
                <div class="box-header-mantenimiento">
                  <h3 class="box-title-mantenimiento">Nuevo Parámetro del Sistema</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>



<form  id="f_nuevo_parametro"  method="post"  action="agregar_nuevo_parametro" class="form-horizontal form_entrada tipo" > 
    
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">            
         

<div class="box-body col-xs-8">
 <label for="tipo_parametro">Seleccionar Tipo de Parámetro</label>
<select  class="form-control"  id="Stipop" name="Stipop" onchange="cargarTipo()">
<?php  foreach($tiposp as $tipop){  ?>
	
   <option id="<?= $tipop->tipo_parametro;?>"> <?= $tipop->tipo_parametro;?></option>
<?php        
}

?>

</select>
</div>

<div class="form-group col-xs-6">
                      <label for="tipo_parametro">Tipo Parámetro*</label>
                      <input type="text" class="form-control" id="tipo_parametro" name="tipo_parametro" placeholder="tipo parametro" >
</div>
<div class="form-group col-xs-6">
                      <label for="estado">Estado</label>
                      <input type="text" class="form-control" id="estado" name="estado" placeholder="estado" maxlength="1" >
</div>

<div class="form-group col-xs-6">
                      <label for="valor_n1">Valor N1</label>
                      <input type="text" class="form-control" id="valor_n1" name="valor_n1" placeholder="valor n1" >
</div>

<div class="form-group col-xs-6">
                      <label for="valor_c1">Valor C1</label>
                      <input type="text" class="form-control" id="valor_c1" name="valor_c1" placeholder="valor c1" >
</div>
<div class="form-group col-xs-6">
                      <label for="descripcion">Descripción</label>
                      <textarea  size="15" class="form-control" id="descripcion" name="descripcion"></textarea >
</div>



<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


</form>

</div>



<script language="javascript" type="text/javascript">
function cargarTipo()
{
	var Stipop = document.getElementById('Stipop').value;
	document.getElementById('tipo_parametro').value = Stipop;
	return;
}
</script> 


