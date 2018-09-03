@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')
<?php
$conexioncon="host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";
$dbconn=pg_connect($conexioncon)or die('no se pudo conectar a la base de datos:'.pg_last_error());
/////////////////////////////////////////////////////////////////////////////////////////////////////
$fecha1 =$_POST['fecha1'];
$hora =$_POST['hora1'];
$arr = explode('-', $fecha1);
//fecha
$f1 = $arr[2]; //dia
$f2 = $arr[1]; //mes
$f3 = $arr[0]; //año
//echo $hora;
switch(($f2)){
		case '1':{
            $f2f="Enero";
        }break;
        case '2':{
            $f2f="Febrero";
        }break;
        case '3':{
            $f2f="Marzo";
        }break;
        case '4':{
            $f2f="Abril";
        }break;
        case '5':{
            $f2f="Mayo";
        }break;
        case '6':{
            $f2f="Junio";
        }break;
        case '7':{
            $f2f="Julio";
        }break;
        case '8':{
            $f2f="Agosto";
        }break;
        case '9':{
            $f2f="Septiembre";
        }break;
        case '10':{
            $f2f="Octubre";
        }break;
        case '11':{
            $f2f="Noviembre";
        }break;
        case '12':{
            $f2f="Diciembre";
        }break;
    }
$fecha2 =$_POST['fecha2'];
$arr2 = explode('-', $fecha2);
$f21 = $arr2[2]; //dia
$f22 = $arr2[1]; //mes
$f23 = $arr2[0]; //año
switch(($f22)){
		case '1':{
            $f22f="Enero";
        }break;
        case '2':{
            $f22f="Febrero";
        }break;
        case '3':{
            $f22f="Marzo";
        }break;
        case '4':{
            $f22f="Abril";
        }break;
        case '5':{
            $f22f="Mayo";
        }break;
        case '6':{
            $f22f="Junio";
        }break;
        case '7':{
            $f22f="Julio";
        }break;
        case '8':{
            $f22f="Agosto";
        }break;
        case '9':{
            $f22f="Septiembre";
        }break;
        case '10':{
            $f22f="Octubre";
        }break;
        case '11':{
            $f22f="Noviembre";
        }break;
        case '12':{
            $f22f="Diciembre";
        }break;
    }
$a=12;
$b=0;
$c="Febrero";
$d=2018;    
$e="Analisis del dia $f1 de $f2f, $f3";
$e="Analisis del dia $f1 de $f22f, $f3";
$s="$d, $b, $a, 0, 0, 0";   
$fechai="08:00";
$fechaf="19:00";
if(($hora<=$fechaf)){
   // echo "Hola Mundo";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Primera Setencia para buscar el primer tipo de vehiuclo Auto Particular
//nomeclatura
//tipo de vehiculo 1  =tv1
//contador tipo de vehiculo = ctv1
//variabke while ntv1
$sql1 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 1  ");
$tv1= pg_num_rows ($sql1);
$ctv1=0;
 while($ntv1=pg_fetch_array($sql1)){ $ctv1++; }
//Primera Setencia para buscar el primer tipo de vehiculo Buses
$sql2 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 2  ");
$tv2= pg_num_rows ($sql2);
$ctv2=0;
 while($ntv2=pg_fetch_array($sql2)){ $ctv2++; }
//Primera Setencia para buscar el segundo tipo de vehiculo Taxi
$sql3 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 3  ");
$tv3= pg_num_rows ($sql3);
$ctv3=0;
 while($ntv3=pg_fetch_array($sql3)){ $ctv3++; }
//Primera Setencia para buscar el tercer tipo de vehiculo Metrovia
$sql4 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 4  ");
$tv4= pg_num_rows ($sql4);
$ctv4=0;
 while($ntv4=pg_fetch_array($sql4)){ $ctv4++; }
//Primera Setencia para buscar el cuarto tipo de vehiculo Moto
$sql5 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 5  ");
$tv5= pg_num_rows ($sql5);
$ctv5=0;
 while($ntv5=pg_fetch_array($sql5)){ $ctv5++; }
//Primera Setencia para buscar el quinto tipo de vehiculo Camion
$sql6 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 6  ");
$tv6= pg_num_rows ($sql6);
$ctv6=0;
 while($ntv6=pg_fetch_array($sql6)){ $ctv6++; }
//Primera Setencia para buscar el sexto tipo de vehiculo Camioneta
$sql7 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 7  ");
$tv7= pg_num_rows ($sql7);
$ctv7=0;
 while($ntv7=pg_fetch_array($sql7)){ $ctv7++; }
//Primera Setencia para buscar el septimo tipo de vehiculo Expreso
$sql8 =pg_query("select * from trayectoria_gye where fecha = '$fecha1 $hora' and id_tipo_vehiculo = 8  ");
$tv8= pg_num_rows ($sql8);
$ctv8=0;
 while($ntv8=pg_fetch_array($sql8)){ $ctv8++;}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql11 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 1  ");
$tv11= pg_num_rows ($sql11);
$ctv11=0;
 while($ntv1=pg_fetch_array($sql11)){ $ctv11++; }
//Primera Setencia para buscar el primer tipo de vehiculo Buses
$sql22 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 2  ");
$tv22= pg_num_rows ($sql22);
$ctv22=0;
 while($ntv2=pg_fetch_array($sql22)){ $ctv22++; }
//Primera Setencia para buscar el segundo tipo de vehiculo Taxi
$sql33 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 3  ");
$tv33= pg_num_rows ($sql33);
$ctv33=0;
 while($ntv33=pg_fetch_array($sql33)){ $ctv33++; }
//Primera Setencia para buscar el tercer tipo de vehiculo Metrovia
$sql44 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 4  ");
$tv44= pg_num_rows ($sql44);
$ctv44=0;
 while($ntv44=pg_fetch_array($sql44)){ $ctv44++; }
//Primera Setencia para buscar el cuarto tipo de vehiculo Moto
$sql55 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 5  ");
$tv55= pg_num_rows ($sql55);
$ctv55=0;
 while($ntv55=pg_fetch_array($sql55)){ $ctv55++; }
//Primera Setencia para buscar el quinto tipo de vehiculo Camion
$sql66 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 6  ");
$tv66= pg_num_rows ($sql66);
$ctv66=0;
 while($ntv66=pg_fetch_array($sql66)){ $ctv66++; }
//Primera Setencia para buscar el sexto tipo de vehiculo Camioneta
$sql77 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 7  ");
$tv77= pg_num_rows ($sql77);
$ctv77=0;
 while($ntv77=pg_fetch_array($sql77)){ $ctv77++; }
//Primera Setencia para buscar el septimo tipo de vehiculo Expreso
$sql88 =pg_query("select * from trayectoria_gye where fecha = '$fecha2 $hora' and id_tipo_vehiculo = 8  ");
$tv88= pg_num_rows ($sql88);
$ctv88=0;
 while($ntv88=pg_fetch_array($sql88)){ $ctv88++; }
////////////////////////////////////////////////////////////////////////////////
?>
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

<!--         
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cuadro Comparativo por Fechas</title>

		<style type="text/css">

		</style>
	</head>
	<body> --> 
        <script src="{{ asset('vendors/highgraphics/code/highcharts.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('vendors/highgraphics/code/modules/export-data.js') }}"></script>



<div id="container" style="min-width: 310px; max-width: 950px; height: 550px; margin: 10">
   
</div>
 <a href="{{ url('admin/analisis/inteligencia/gdiaria') }}" class="btn btn-primary btn-sm ml-auto">Regresar</a> 
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Cuadro Comparativo Por Fechas'
    },
    
    xAxis: {
        categories: ['Auto Particular', 'Buses', 'Taxi', 'Metrovia', 'Moto', 'Camion','Camioneta','Expreso'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de Transporte',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
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
        y: 410,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name:"<?php echo $fecha1; echo "  "; echo $hora; ?>",
        data:[<?php 
         echo $ctv1; echo ","; echo $ctv2; echo ","; echo $ctv3; echo ","; echo $ctv4; echo ","; echo $ctv5; echo ","; echo $ctv6; echo ","; echo $ctv7; echo ","; echo $ctv8; 
        ?>]
    },{
       name:"<?php echo $fecha2; echo "  "; echo $hora; ?>",
       data:[<?php 
         echo $ctv11; echo ","; echo $ctv22; echo ","; echo $ctv33; echo ","; echo $ctv44; echo ","; echo $ctv55; echo ","; echo $ctv66; echo ","; echo $ctv77; echo ","; echo $ctv88; 
        ?>]
        }
        
    ]
    }
);
		</script>
<?php
    }else{
    echo "No se Encuentra en el Rango de Horas (08:00 - 19:00)";
}
?>
<!-- 	</body>
</html> -->
</div>
          </div>
    <!--</body>
</html> -->
@endsection 
