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
                    <h2><i class="fa fa-bars"></i> Gráfica comparativa mensual </h2>
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
$conexioncon="host='52.38.27.79' port='5432' dbname='bd_trafico' user='postgres' password='admin1234'";
$dbconn=pg_connect($conexioncon)or die('no se pudo conectar a la base de datos:'.pg_last_error());
//aqui se va arecibir los del formulario anterios
//tener en cuenta qeu si se llena adañr eliminar esat seccion
//////////////////////////////////////////////////////////////////////////////////
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

//En esta parte se va a jalar los valores de la tabla para mostrar
 $sqlcon = "SELECT *  FROM datos WHERE id_anio = '".$vsida."' AND id_mes = '".$vsidm."' ORDER BY id_datos ASC";
//Consulta Base de datos
$resTotal="select * from vehiculos";
//presentacion de datos
$titulo="CANTIDAD DEL TRANSPORTE URBANO DEL MES DE $vsm DEL $vsa ";
//echo $titulo;
//$a1="{ name:'".$nom1."', y:".$cnta1."},";
//$a2="{ name:'".$nom2."', y:".$cnta2."},";
//$a3="{ name:'".$nom3."', y:".$cnta3."},";
//$a4="{ name:'".$nom4."', y:".$cnta4."},";
//$a5="{ name:'".$nom5."', y:".$cnta5."},";
//$a6="{ name:'".$nom6."', y:".$cnta6."},";
//$a7="{ name:'".$nom7."', y:".$cnta7."},";
//$a8="{ name:'".$nom8."', y:".$cnta8."},";
//$a9="{ name:'".$nom9."', y:".$cnta9."},";
//codigo de combo para ver si funciona la implementacion

///////////////////////////////////////////////////////////////////////

// linea original de highchart <div id="container" style="min-width: 310px; height: 350px; max-width: 500px; margin: 0 auto"></div>
//////////////////////////////////////////////////////////////////
//tener en cuenta que aqui se va a generar un while para mostrar
$sqlcon =pg_query("SELECT *  FROM datos WHERE id_anio = '".$vsida."' AND id_mes = '".$vsidm."' ORDER BY id_datos ASC");
   // $consultacon= pg_query ($conexioncon, $sqlcon) or die ("Fallo en la consulta");
	$nfilascon= pg_num_rows($sqlcon);
?>
<!-- <html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cantidad de Transporte</title>
		<style type="text/css">
		</style>
	</head>
	<body> -->



    <script src="{{ asset('vendors/highgraphics/code/highcharts.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/export-data.js') }}"></script>

<div id="container" style="min-width: 80px; height: 500px; margin: 0 auto"></div>
		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null, 
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<?php echo $titulo ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [
            <?php
                while($nfilascon=pg_fetch_array($sqlcon)){
                echo "{ name:'".$nfilascon['transporte']."', y:".$nfilascon['cantidad']."},";
                }?>
            
        ]
    }]
});
		</script>
        
    
 <!--    </body>
</html> -->
</div>
</div>
@endsection
