
@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')

   <div class=" " role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Presentación de informe de tráfico vehicular </h3>
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
                    <h2><i class="fa fa-bars"></i> Gráfica Anual </h2>
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

        <?php
//$conexion=mysqli_connect('localhost','root','','datos');
//$conexioncon2=mysqli_connect('localhost','root','','bd_trafico');
$conexioncon2="host='52.38.27.79' port='5432' dbname='bd_trafico' user='postgres' password='admin1234'";
$dbconn=pg_connect($conexioncon2)or die('no se pudo conectar a la base de datos:'.pg_last_error());
session_start(); // inicio sesiones
// Se asume como global $variable.
// No distinguiendo si es de sesión o de otro metodo
// Si fallase el inico de session, una $variable
// entrando por GET podria ser considerado  
// como la varaible de la sesión:
// lee_variable.php?variable=mi_valor_trampa

$vsm=$_SESSION['variablem'];
$vsa=$_SESSION['variablea'];
$vsidm=$_SESSION['variableidm'];
$vsida=$_SESSION['variableida'];
//echo $vsm;
//echo $vsa;
//echo $vsidm;
//echo $vsida;
//consulta basica
if($vsa==2017)
{
    $anio='2017';
}
if($vsa==2018)
{
    $anio='2018';
}

$titulo="DEL AÑO $vsa ";

////////////////////////////////////////AUTO PARTICULAR/////////////////////////////
$sqlconap =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 1 and id_mes >= 1 and id_mes <=11");
//$consultaconap= mysqli_query ($conexioncon2, $sqlconap) or die ("Fallo en la consulta");
$nfilasconap= pg_num_rows ($sqlconap);
/////////////////////////////////////////////////////////////////////
$sqlconap1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 1 and id_mes = 12");
//$consultaconap1= mysqli_query ($conexioncon2, $sqlconap1) or die ("Fallo en la consulta");
$nfilasconap1= pg_num_rows ($sqlconap1);
////////////////////////////////BUSES/////////////////////////////////////
$sqlconb =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 2 and id_mes >= 1 and id_mes <=11");
//$consultaconb= mysqli_query ($conexioncon2, $sqlconb) or die ("Fallo en la consulta");
$nfilasconb= pg_num_rows ($sqlconb);
/////////////////////////////////////////////////////////////////////
$sqlconb1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 2 and id_mes = 12");
//$consultaconb1= mysqli_query ($conexioncon2, $sqlconb1) or die ("Fallo en la consulta");
$nfilasconb1= pg_num_rows ($sqlconb1);
////////////////////////////////TAXI/////////////////////////////////////
$sqlcont =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 3 and id_mes >= 1 and id_mes <=11");
//$consultacont= mysqli_query ($conexioncon2, $sqlcont) or die ("Fallo en la consulta");
$nfilascont= pg_num_rows ($sqlcont);
/////////////////////////////////////////////////////////////////////
$sqlcont1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 3 and id_mes = 12");
//$consultacont1= mysqli_query ($conexioncon2, $sqlcont1) or die ("Fallo en la consulta");
$nfilascont1= pg_num_rows ($sqlcont1);
//////////////////////////////////METROVIA///////////////////////////////////
$sqlconme =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 4 and id_mes >= 1 and id_mes <=11");
///$consultaconme= mysqli_query ($conexioncon2, $sqlconme) or die ("Fallo en la consulta");
$nfilasconme= pg_num_rows ($sqlconme);
/////////////////////////////////////////////////////////////////////
$sqlconme1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 4 and id_mes = 12");
//$consultaconme1= mysqli_query ($conexioncon2, $sqlconme1) or die ("Fallo en la consulta");
$nfilasconme1= pg_num_rows ($sqlconme1);
//////////////////////////////////////MOTO///////////////////////////////
$sqlconmo = pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 5 and id_mes >= 1 and id_mes <=11");
///$consultaconmo= mysqli_query ($conexioncon2, $sqlconmo) or die ("Fallo en la consulta");
$nfilasconmo= pg_num_rows ($sqlconmo);
/////////////////////////////////////////////////////////////////////
$sqlconmo1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 5 and id_mes = 12");
//$consultaconmo1= mysqli_query ($conexioncon2, $sqlconmo1) or die ("Fallo en la consulta");
$nfilasconmo1= pg_num_rows ($sqlconmo1);
//////////////////////////////////////CAMION///////////////////////////////
$sqlconc =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 6 and id_mes >= 1 and id_mes <=11");
//$consultaconc= mysqli_query ($conexioncon2, $sqlconc) or die ("Fallo en la consulta");
$nfilasconc=pg_num_rows ($sqlconc);
/////////////////////////////////////////////////////////////////////
$sqlconc1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 6 and id_mes = 12");
//$consultaconc1= mysqli_query ($conexioncon2, $sqlconc1) or die ("Fallo en la consulta");
$nfilasconc1= pg_num_rows ($sqlconc1);
//////////////////////////////////////CAMIONETA///////////////////////////////
$sqlconca =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 7 and id_mes >= 1 and id_mes <=11");
//$consultaconca= mysqli_query ($conexioncon2, $sqlconca) or die ("Fallo en la consulta");
$nfilasconca= pg_num_rows ($sqlconca);
/////////////////////////////////////////////////////////////////////
$sqlconca1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 7 and id_mes = 12");
//$consultaconca1= mysqli_query ($conexioncon2, $sqlconca1) or die ("Fallo en la consulta");
$nfilasconca1= pg_num_rows ($sqlconca1);
//////////////////////////////////////EXPRESO///////////////////////////////
$sqlconex =pg_query("SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 8 and id_mes >= 1 and id_mes <=11");
//$consultaconex= mysqli_query ($conexioncon2, $sqlconex) or die ("Fallo en la consulta");
$nfilasconex= pg_num_rows ($sqlconex);
/////////////////////////////////////////////////////////////////////
$sqlconex1 =pg_query("SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 8 and id_mes = 12");
//$consultaconex1= mysqli_query ($conexioncon2, $sqlconex1) or die ("Fallo en la consulta");
$nfilasconex1= pg_num_rows ($sqlconex1);
while ($nfilasconap1=pg_fetch_array($sqlconap1)){ 
    $dfap=$nfilasconap1['cantidad'];
}
while ($nfilasconb1=pg_fetch_array($sqlconb1)){ 
    $dfb=$nfilasconb1['cantidad'];
}
while ($nfilascont1=pg_fetch_array($sqlcont1)){ 
    $dft=$nfilascont1['cantidad'];
}
while ($nfilasconme1=pg_fetch_array($sqlconme1)){ 
    $dfme=$nfilasconme1['cantidad'];
}
while ($nfilasconmo1=pg_fetch_array($sqlconmo1)){ 
    $dfmo=$nfilasconmo1['cantidad'];
}
while ($nfilasconc1=pg_fetch_array($sqlconc1)){ 
    $dfc=$nfilasconc1['cantidad'];
}
while ($nfilasconca1=pg_fetch_array($sqlconca1)){ 
    $dfca=$nfilasconca1['cantidad'];
}
while ($nfilasconex1=pg_fetch_array($sqlconex1)){ 
    $dfex=$nfilasconex1['cantidad'];
}
?>
<!-- <!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grafica Anual</title>

		<style type="text/css">

		</style>
	</head>
	<body> -->
    <script src="{{ asset('vendors/highgraphics/code/highcharts.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/series-label.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/export-data.js') }}"></script>



<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Cantidad de Vehiculos de la Ciudad de Guayaquil'
    },
    subtitle: {
        text: '<?php echo $titulo ?>'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    yAxis: {
        title: {
            text: 'CANTIDAD '
        },
        labels: {
            formatter: function () {
                return this.value + '';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Auto Particular' ,  
        marker: {
            symbol: 'square'
        },
        data: [ <?php while ($nfilasconap=pg_fetch_array($sqlconap)){ 
        echo $nfilasconap['cantidad']."00,";}
            echo $dfap."00";?>
              ]
    },{
        name: 'Buses' ,  
        marker: {
            symbol: 'circle'
        },
        data: [ <?php while ($nfilasconb=pg_fetch_array($sqlconb)){ 
        echo $nfilasconb['cantidad']."00,";}
            echo $dfb."00";?>
              ]
    },{
        name: 'Taxi' ,  
        marker: {
            symbol: 'triangle'
        },
        data: [ <?php while ($nfilascont=pg_fetch_array($sqlcont)){ 
        echo $nfilascont['cantidad']."00,";}
            echo $dft."00";?>
              ]
    },{
        name: 'Metrovia' ,  
        marker: {
            symbol: 'cross'
        },
        data: [ <?php while ($nfilasconme=pg_fetch_array($sqlconme)){ 
        echo $nfilasconme['cantidad']."0,";}
            echo $dfme."0";?>
              ]
    },{
        name: 'Moto' ,  
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php while ($nfilasconmo=pg_fetch_array($sqlconmo)){ 
        echo $nfilasconmo['cantidad']."00,";}
            echo $dfmo."00";?>
              ]
    },{
        name: 'Camion' ,  
        marker: {
            symbol: 'triangle-down'
        },
        data: [ <?php while ($nfilasconc=pg_fetch_array($sqlconc)){ 
        echo $nfilasconc['cantidad']."00,";}
            echo $dfc."00";?>
              ]
    },{
        name: 'Camioneta' ,  
        marker: {
            symbol: 'square'
        },
        data: [ <?php while ($nfilasconca=pg_fetch_array($sqlconca)){ 
        echo $nfilasconca['cantidad']."00,";}
            echo $dfca."00";?>
              ]
    },{
        name: 'Expreso' ,  
        marker: {
            symbol: 'square'
        },
        data: [ <?php while ($nfilasconex=pg_fetch_array($sqlconex)){ 
        echo $nfilasconex['cantidad']."00,";}
            echo $dfex."00";?>
              ]
    }
    ]}
);
		</script>
        <a href="{{ url('admin/analisis/inteligencia') }}" class="btn btn-primary btn-sm ml-auto" >Regresar</a>
</div>
</div>
<!-- 	</body>
</html> -->
@endsection