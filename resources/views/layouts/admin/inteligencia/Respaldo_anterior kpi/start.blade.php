@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')

<?php 
$conn_string = "host= 52.38.27.79 port=5432 dbname=bd_trafico user=postgres password=admin1234";
$conexion = pg_connect($conn_string);
$va=0;
$vm=0;
$a=0;
$m=0;
$anio=0;
$mes=0;
//
?>


<!--<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Busqueda de Informe</title>
</head>
<body>-->
   
            <div class="alert alert-info">
            <h4 align="center ">PRESENTACION DE INFORME DE TRAFICO VEHICULAR</h4>
            </div>
    
<form id="formulario" action="admin/analisis/inteligencia" method="post" enctype="application/x-www-form-urlencoded">@csrf
<label for="caja1"> Seleccione el Año: </label>
    <select name="anio">
        <option value="2017" >2017</option>
        <option value="2018" >2018</option>        
    </select> 
    <br> 
    <label for="caja1"> Seleccione el Mes: </label>
    <select name="mes">
        <option value="ENERO" >Enero</option>
        <option value="FEBRERO" >Febrero</option>
        <option value="MARZO" >Marzo</option>
        <option value="ABRIL" >Abril</option>
        <option value="MAYO" >Mayo</option>
        <option value="JUNIO" >Junio</option>
        <option value="JULIO" >Julio</option>
        <option value="AGOSTO" >Agosto</option>
        <option value="SEPTIEMBRE" >Septiembre</option>
        <option value="OCTUBRE" >Octubre</option>
        <option value="NOVIEMBRE" >Noviembre</option>
        <option value="DICIEMBRE" >Diciembre</option>
        </select>  
        <input name="traducir" type=submit value="Mostrar">
    </form> 
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
    $(document).on('ready',function(){
      $('#btn-ingresar').click(function(){
        var url = "indexbk.php";                                      
        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario").serialize(),
           success: function(data)            
           {
             $('#resp').html(data);           
           }
         });
      });
    });
    </script>
    <table class="col-md-5">
                <tr class="bg-primary">
                    <th class="pad-basic">ID  </th>
                    <th class="pad-basic">AÑO </th>
                    <th class="pad-basic">MES </th>
                    <th class="pad-basic">TIPO TRANSPORTE</th>
                    <th class="pad-basic">CANTIDAD</th>
                <tr>
    <?php
     if(isset($_POST['anio']))
     {
    //se presentara aqui la info en el repsot                
    //verificaciond e año y guardar la variable
    switch(($_POST['anio'])){
        case '2016':{
            $a="2016";
            //echo $p6;
        }break;
            case '2017':{
            $a="2017";
           // echo $p7;
        }break;
            case '2018':{
            $a="2018";
            //echo $p8;
        }break;
    }
    //verificacion de mes
    switch(($_POST['mes'])){
        case 'ENERO':{
            $m="ENERO";
            //echo $p6;
        }break;
            case 'FEBRERO':{
            $m="FEBRERO";
            //echo $p6;
        }break;
            case 'MARZO':{
            $m="MARZO";
            //echo $p6;
        }break;
            case 'ABRIL':{
            $m="ABRIL";
            //echo $p6;
        }break;
            case 'MAYO':{
            $m="MAYO";
            //echo $p6;
        }break;
            case 'JUNIO':{
            $m="JUNIO";
            //echo $p6;
        }break;
        case 'JULIO':{
            $m="JULIO";
            //echo $p6;
        }break;
        case 'AGOSTO':{
            $m="AGOSTO";
            //echo $p6;
        }break;
        case 'SEPTIEMBRE':{
            $m="SEPTIEMBRE";
            //echo $p6;
        }break;
            case 'OCTUBRE':{
            $m="OCTUBRE";
            //echo $p6;
        }break;
            case 'NOVIEMBRE':{
            $m="NOVIEMBRE";
            //echo $p6;
        }break;
         case 'DICIEMBRE':{
            $m="DICIEMBRE";
            //echo $p6;
        }break;   
            
    }
     }else{
         echo " ";
     }
    //se verifica en la base de datos y se igual el id
    $sqlA="select * from anio where descripcion ='".$a."'";
    $consultaA = pg_query($conexion, $sqlA) or die ("Fallo en la consulta año");
    $nfilasA = pg_num_rows($consultaA);
    while($nfilasA=pg_fetch_array($consultaA)){
        $va=$nfilasA['id_anio'];
    }
    //SE SACA LA VARIABLE DEL MES
    $sqlM="select * from mes where descripcion ='".$m."'";
    $consultaM = pg_query ($conexion, $sqlM) or die ("Fallo en la consulta mes");
    $nfilasM = pg_num_rows ($consultaM);
    //$a=0;
    while($nfilasM=pg_fetch_array($consultaM)){
        $vm=$nfilasM['id_mes'];
    }
    
    //las variables ya las tengo aqui debo seleccion multiple
   //echo $va;?><?php
 //  echo $vm;
    //aqui viene los joins
   $sqlmostrar = "SELECT *  FROM datos WHERE id_anio = '".$va."' AND id_mes = '".$vm."' ORDER BY id_datos ASC";
   // $consultam = pg_query ($conexion, $sqlmostrar) or die ("Fallo en la consulta");
    //$nfilasm = pg_num_rows ($consultam);
    //$sqlmt = "SELECT *  FROM transporte";
   // $consultamt = pg_query ($conexion, $sqlmt) or die ("Fallo en la consulta");
    //$nfilasmt = pg_num_rows ($consultamt);
    // while($nfilasmt=pg_fetch_array($consultamt)){
    ///codigo para poder mostrar los datos de la tabla
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //echo $va;
     //echo $vm;  
                    $queryf="SELECT d.id_datos,d.cantidad,
                       an.descripciona,
                       tr.descripciont,
                       ms.descripcionm
                       FROM datos d, anio an, mes ms, transporte tr 
                       where d.id_anio = an.id_anio and d.id_mes = ms.id_mes
                       and d.id_transporte = tr.id_transporte
                       and d.id_anio = '".$va."' and d.id_mes='".$vm."' ";               
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                    
    //$query="SELECT d.id_datos,d.cantidad,
      //                 an.descripcion,
        //             ms.descripcion
          //             FROM datos d
            //           INNER JOIN anio an ON d.id_anio = '$va'
                //       INNER JOIN mes ms ON d.id_mes = '$vm'";
        
    $consultaq=pg_query ($conexion, $sqlmostrar) or die ("Fallo en la consulta old");
    $nfilasq = pg_num_rows ($consultaq);
    if($nfilasq>0){
        if($va>=0)
        {
            
    //echo "<b>CANTIDADES DE VEHICULOS DEL MES DE $m <br></b>";
    //while($nfilasq=pg_fetch_array($consultaq)){
    //                  echo $nfilasq['cantidad'];?><?php
                        //echo "<br";
    //}
    //
 //   while($nfilasm=pg_fetch_array($consultam)){
//    ;
   

    ?>             
    <?php
    //se va acrear session para manipular los datos 
    ///////////////////////////////////////////////////////////////////////////////////
   //echo $vm;
    $variable=0;
    session_start(); // inicio sesiones.
    $_SESSION['variablem']=$m; // registrar $variable en session.
    $_SESSION['variablea']=$a; // registrar $variable en session.
    $_SESSION['variableidm']=$vm; // registrar $variable en session.
    $_SESSION['variableida']=$va; // registrar $variable en session.
   //$variable=$vm;
      //  echo $a;
    //    echo $m;
     //   echo $vm;
    //    echo $va;
        
    ///////////////////////////////////////////////////////////////////////////////////
    $consultaq2=pg_query ($conexion, $queryf) or die ("Fallo en la consulta New");
    $nfilasq2 = pg_num_rows ($consultaq2);    
    while ($nfilasq2=pg_fetch_array($consultaq2)){
                        echo'
                        <tr>
                        <td>'.$nfilasq2['id_datos'].'</td>
                        <td>'.$nfilasq2['descripciona'].'</td>
                        <td>'.$nfilasq2['descripcionm'].'</td>
                        <td>'.$nfilasq2['descripciont'].'</td>
                        <td>'.$nfilasq2['cantidad'].'</td>
                        </tr>
                        ';
                    }
            
?>
                    <BR>
    </table>
<div id="resp"></div>
                <td class="pad-basic"><div id="resp2"></div></td>
                    
    <br><br><br><br><br><br><br><br><br>
    <br>
                    <?php
        ////////////////////////////////////////////////////////
            /// se va a presentar el total de vehiculos
            $sqltotal ="select SUM(cantidad) FROM datos WHERE id_anio = '".$va."' and id_mes = '".$vm."' ";
            $consultatotal=pg_query ($conexion, $sqltotal) or die ("Fallo en la consulta New");
            $nfilastotal= pg_num_rows ($consultatotal);    
            while ($nfilastotal=pg_fetch_array($consultatotal)){
                        echo "CANTIDAD TOTAL DE VEHICULOS POR MIL ".$nfilastotal['SUM(cantidad)']."";
            }
            //echo $consultatotal;
    
    ?>
    <script language="javascript">
function otra_ventana(direccion) {
window.onload=(direccion);
}
</script>
    <form action="indexbk.php" method="post" enctype="application/x-www-form-urlencoded">
    <br>
    <input name="grafico" type=button id=btn-ingresar value="Mostrar Grafica Mensual">
    <?php
    }else{
    $sqleM="select * from mes where id_mes ='".$vm."'";
    $consultaeM = pg_query ($conexion, $sqleM) or die ("Fallo en la consulta");
    $nfilaseM = pg_num_rows ($consultaeM);
    $sqleA="select * from anio where id_anio ='".$va."'";
    $consultaeA = pg_query ($conexion, $sqleA) or die ("Fallo en la consulta");
    $nfilaseA = pg_num_rows ($consultaeA);
    while($nfilaseM=pg_fetch_array($consultaeM)){
        $vm1=$nfilaseM['descripcionm'];
    }
    while($nfilaseA=pg_fetch_array($consultaeA)){
        $va1=$nfilaseA['descripciona'];
    }
        echo "<b>NO HAY REGISTRO DEL MES DEL $vm1 EN EL AÑO $va1</b>";
    }
    }else{
         $sqleM="select * from mes where id_mes ='".$vm."'";
    $consultaeM = pg_query ($conexion, $sqleM) or die ("Fallo en la consulta");
    $nfilaseM = pg_num_rows ($consultaeM);
    $sqleA="select * from anio where id_anio ='".$va."'";
    $consultaeA = pg_query ($conexion, $sqleA) or die ("Fallo en la consulta");
    $nfilaseA = pg_num_rows ($consultaeA);
    while($nfilaseM=pg_fetch_array($consultaeM)){
        $vm1=$nfilaseM['descripcionm'];
    }
    while($nfilaseA=pg_fetch_array($consultaeA)){
        $va1=$nfilaseA['descripciona'];
    } if((isset($_POST['anio'])) and (isset($_POST['mes']))){
        echo "NO HAY REGISTRO DEL MES DEL $vm1 EN EL AÑO $va1</b>";}
    }

?> 
</form>
<br> <a href="grafico_2p.php">Grafica Anual</a>  <br>
<br> <a href="comparacion.php" >Grafica Comparativa</a>  <br>
<!--</body>
</html>-->
@endsection