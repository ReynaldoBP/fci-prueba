@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')

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
                    <h2><i class="fa fa-bars"></i> Tabla Comparativa por Año </h2>
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
    //$conexioncon=mysqli_connect('localhost','root','','bd_trafico');
    $conexioncon="host='52.38.27.79' port='5432' dbname='bd_trafico' user='postgres' password='admin1234'";
    $dbconn=pg_connect($conexioncon)or die('no se pudo conectar a la base de datos:'.pg_last_error());
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
    $ia=2;
    $ia2=3;
    $titulo="DEL AÑO $vsa ";
    //vamos a sacar el año a analizar
    $sqlcon =pg_query("SELECT *  FROM anio WHERE id_anio = '".$ia."'");
    //$consultacon= mysqli_query ($conexioncon, $sqlcon) or die ("Fallo en la consulta");
    $nfilascon= pg_num_rows ($sqlcon);
    $sqlcon1 =pg_query("SELECT *  FROM anio WHERE id_anio = '".$ia2."'");
    //$consultacon1= mysqli_query ($conexioncon, $sqlcon1) or die ("Fallo en la consulta");
    $nfilascon1= pg_num_rows ($sqlcon1);
    //sacar tabla descripcionde tipo de vehiculos
    $cant=pg_query("SELECT * FROM datos WHERE id_anio = 2 AND id_mes='".$vsidm."'");
    //$ccant= mysqli_query ($conexioncon, $cant) or die ("Fallo en la consulta");
    $nfcant= pg_num_rows ($cant);
    ///////////////////////
    $cant1=pg_query("SELECT * FROM datos WHERE id_anio = 3 AND id_mes='".$vsidm."'");
    //$ccant1= mysqli_query ($conexioncon, $cant1) or die ("Fallo en la consulta");
    $nfcant1= pg_num_rows ($cant1);
    ?>



<!-- <!DOCTYPE HTML>
<html> 
	 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tabla Comparativa por Año</title>

		<style type="text/css">

		</style>
	</head>  
	<body> -->
    <script src="{{ asset('vendors/highgraphics/code/highcharts.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/export-data.js') }}"></script>

    <div id="container" class="center-block" style="min-width: 310px; max-width: 750px; height: 350px; margin: 10"></div>



		<script type="text/javascript">
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
            },
            title: 
            {
                text: 'Comparacion por Año del Mes de <?php  echo $vsm; ?>'
            },
    
            xAxis: 
            {
                categories: ['Auto Particular', 'Buses', 'Taxi', 'Metrovia', 'Moto', 'Camion','Camioneta','Expreso'],
                title: 
                {
                    text: null
                }
            },
            yAxis: 
            {
                min: 0,
                title: 
                {
                    text: 'Cantidad de Transporte por Mil',
                    align: 'high'
                },
                labels:
                {                   
                    overflow: 'justify'
                }
            },
            tooltip: 
            {
            valueSuffix: ' '
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name:"Año 2017",
            <?php
                $cont=0;
            ?>
            data:[<?php 
                while($nfcant=pg_fetch_array($cant)){
                    if($cont<7)
                        { echo $nfcant['cantidad']; $cont++; ?>,<?php
            
                    }else{
                        echo $nfcant['cantidad']; 
                    }
                }
            ?>]
        },{
       name:"Año 2018",
        <?php
        $cont1=0;
        ?>
        data:[<?php 
         while($nfcant1=pg_fetch_array($cant1)){
            if($cont1<7)
            { echo $nfcant1['cantidad']; $cont1++; ?>,<?php
            
            }else{
               echo $nfcant1['cantidad']; 
            }
        }
        ?>]
        }
        
    ]
    }
);
		</script>
</div>
          </div>
	<!--</body>
</html> -->
@endsection 