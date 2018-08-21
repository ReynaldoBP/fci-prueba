<div class="box-mantenimiento box-primary-mantenimiento">

<div class="box-header-mantenimiento">
                  <h3 class="box-title">Parámetros Encontrados</h3>
                </div>

<div class="box-body">              
<?php 

if( count($parametros) >0){
?>

<table id="tabla_parametro" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Tipo Parámetros</th>
                <th>Estado</th>
                <th>valor c1</th>
				<th>Acción</th>
			</tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($parametros as $parametro){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $parametro->id_parametro; ?></td>
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha(<?= $parametro->id_parametro; ?>);"  style="display:block">&nbsp;&nbsp;<?= $parametro->tipo_parametro?></a></td>
    <td><?= $parametro->estado;  ?></td>
    <td><?= $parametro->valor_c1;  ?></td>
    <td><button class="btn  btn-skin-green btn-xs" onclick="mostrarficha(<?= $parametro->id_parametro; ?>);" ><i class="fa fa-fw fa-eye"></i>Editar</button></td>
</tr>

<?php        
}
?>


  

    </table>



    <?php


echo str_replace('/?', '?', $parametros->render() )  ;

}
else
{

?>


<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun paràmetro...</label>  </div> 

<?php
}

?>
</div>



