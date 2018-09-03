@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')

<?php 
//$conexion=pg_connect('localhost','root','','bd_trafico');
$conexion="host='52.38.27.79' port='5432' dbname='bd_trafico' user='postgres' password='admin1234'";
$dbconn=pg_connect($conexion)or die('no se pudo conectar a la base de datos:'.pg_last_error());
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
<!--Cabecera-------->
    <div class=" " role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Presentacion de informe de tráfico vehicular </h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar por...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Indicadores KPI </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a> 
                       <ul class="dropdown-menu" role="menu">  
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
        <!--Cabecera-------->

    <!-- <header>
            <div class="alert alert-info">
            <h4>PRESENTACION DE INFORME DE TRAFICO VEHICULAR</h4>
            </div>
    </header> -->
    <style type="text/css">
        .no-padding{
            padding: 0;
        }
        .selectAltura {
            display:block;
            height:50px;
            width:200px;
        }

        .selectAltura2 {
            padding:20px;
        }
    </style>
<div role="tabpanel" class="tab-pane fade active in"  >
  <form id="formulario" action="/admin/analisis/inteligencia" method="post"  class="form-horizontal form-label-left">
     @csrf
     <div class="form-group">
        <label for="caja1" class="control-label col-md-3 col-sm-3 col-xs-12" > Seleccione el Año: </label>
        <div class="col-md-5 col-sm-6 col-xs-12">
            <select name="anio" class="form-control col-md-7 col-xs-12">
                <option value="2017" >2017</option>
                <option value="2018" >2018</option>        
            </select> 
        </div>
    </div>
     
    <div class="form-group">
        <label for="caja1" class="control-label col-md-3 col-sm-3 col-xs-12"> Seleccione el Mes: </label>
        <div class="col-md-5 col-sm-6 col-xs-12">
            <select name="mes" class="form-control col-md-7 col-xs-12">
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
        </div>
    </div>

    <div align="right" class="form-group col-md-5 col-sm-6 col-xs-12">
        <input name="traducir" type=submit value="Mostrar" class="btn btn-primary btn-sm btn-lg " >
    </div>

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
    <table class="col-md-5 table table-bordered">
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
        //$q=pg_query("SELECt cantidad FROM datos where id_anio ='2' and id_mes='1'");
        $sqlA=pg_query("select * from anio where descripciona ='".$a."'");
        //$consultaA = pg_query ($conexion, $sqlA) or die ("Fallo en la consulta año");
        $nfilasA = pg_num_rows ($sqlA);
    while($nfilasA=pg_fetch_array($sqlA)){
        $va=$nfilasA['id_anio'];
    }
        //SE SACA LA VARIABLE DEL MES
        $sqlM=pg_query("select * from mes where descripcionm ='".$m."'");
        //$consultaM = pg_query ($conexion, $sqlM) or die ("Fallo en la consulta mes");
        $nfilasM = pg_num_rows ($sqlM);
        //$a=0;
        while($nfilasM=pg_fetch_array($sqlM)){
         $vm=$nfilasM['id_mes'];
    }
    
    //las variables ya las tengo aqui debo seleccion multiple
   //echo $va;?>
   <?php
    //  echo $vm;
    //aqui viene los joins
   $sqlmostrar =pg_query("SELECT *  FROM datos WHERE id_anio = '".$va."' AND id_mes = '".$vm."' ORDER BY id_datos ASC");
    ///codigo para poder mostrar los datos de la tabla
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //echo $va;
     //echo $vm;  
    $queryf=pg_query("SELECT d.id_datos,d.cantidad,
                       an.descripciona,
                       tr.descripciont,
                       ms.descripcionm
                       FROM datos d, anio an, mes ms, transporte tr 
                       where d.id_anio = an.id_anio and d.id_mes = ms.id_mes
                       and d.id_transporte = tr.id_transporte
                       and d.id_anio = '".$va."' and d.id_mes='".$vm."' ");               
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    //$consultaq=pg_query ($conexion, $sqlmostrar) or die ("Fallo en la consulta old");
    $nfilasq = pg_num_rows ($sqlmostrar);
    if($nfilasq>0){
        if($va>=0)
        {
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
    //$consultaq2=pg_query ($conexion, $queryf) or die ("Fallo en la consulta New");
    $nfilasq2 = pg_num_rows ($queryf);    
    while ($nfilasq2=pg_fetch_array($queryf)){
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
                <br>
                <br>
                <br><br><br><br><br><br><br>
                <br>
            <?php
                ////////////////////////////////////////////////////////
                /// se va a presentar el total de vehiculos
                //echo "prueba".$va;
                $sqltotal =pg_query("select sum(cantidad) FROM datos WHERE id_anio = '".$va."' and id_mes = '".$vm."' ");
                //$consultatotal=pg_query ($conexion, $sqltotal) or die ("Fallo en la consulta New");
                $nfilastotal= pg_num_rows ($sqltotal);    
                while ($nfilastotal=pg_fetch_array($sqltotal))
                    {
                        //  echo "CANTIDAD TOTAL DE VEHICULOS POR MIL ".$nfilastotal['cantidad']."";
                    }
            //echo $consultatotal;
            ?>
    <script language="javascript">
        function otra_ventana(direccion) {
        window.onload=(direccion);
        }
    </script>


    <form action="/admin/analisis/inteligencia/g_mensual" method="post" enctype="application/x-www-form-urlencoded">
        @csrf
    <!--<br>-->
    <div class="btn-group ml-auto" align="center">
        <a href="{{ url('admin/analisis/inteligencia/g_anual') }}" class="btn btn-primary btn-sm ml-auto">Grafica Anual</a> 
        <a href="{{ url('admin/analisis/inteligencia/comparacion_mensual') }}" class="btn btn-primary btn-sm ml-auto">Grafica Comparativa</a>
        <input name="grafico" type=submit id=btn-ingresar value="Mostrar Grafica Mensual" class="btn btn-primary btn-sm ml-auto">  
    </div>
        
    <?php
        }else{
            $sqleM=pg_query("select * from mes where id_mes ='".$vm."'");
            //$consultaeM = pg_query ($conexion, $sqleM) or die ("Fallo en la consulta");
            $nfilaseM = pg_num_rows ($consultaeM);
            $sqleA=pg_query("select * from anio where id_anio ='".$va."'");
            //$consultaeA = pg_query ($conexion, $sqleA) or die ("Fallo en la consulta");
            $nfilaseA = pg_num_rows ($consultaeA);
            while($nfilaseM=pg_fetch_array($consultaeM)){
            $vm1=$nfilaseM['descripcionm'];
            }
        while($nfilaseA=pg_fetch_array($consultaeA)){
            $va1=$nfilaseA['descripciona'];
        }
            echo "<b>NO HAY REGISTRO DEL MES DEL $vm1 EN EL AÑO $va1</b>";
        }
        }else
        {
            $sqleM=pg_query("select * from mes where id_mes ='".$vm."'");
            //$consultaeM = pg_query ($conexion, $sqleM) or die ("Fallo en la consulta");
            $nfilaseM = pg_num_rows($sqleM);
            $sqleA=pg_query("select * from anio where id_anio ='".$va."'");
            //$consultaeA = pg_query ($conexion, $sqleA) or die ("Fallo en la consulta");
            $nfilaseA = pg_num_rows ($sqleA);
            while($nfilaseM=pg_fetch_array($sqleM)){
                $vm1=$nfilaseM['descripcionm'];
            }
            while($nfilaseA=pg_fetch_array($sqleA)){
                $va1=$nfilaseA['descripciona'];
            } if((isset($_POST['anio'])) and (isset($_POST['mes']))){
                echo "NO HAY REGISTRO DEL MES DEL $vm1 EN EL AÑO $va1</b>";}
        }

    ?> 
    </form>
    
</div>
</div>
</div>
<!--</body>
</html>-->
@endsection