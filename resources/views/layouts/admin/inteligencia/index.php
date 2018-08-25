<?php 
	$conexion=mysqli_connect('localhost','root','','datos');

//if($conexion->mysqli_connect_errno().")".$conexion
//Consulta Base de datos
$resTotal="select * from vehiculos";
$consulta = mysqli_query ($conexion, $resTotal) or die ("Fallo en la consulta");
$nfilas = mysqli_num_rows ($consulta);

$resA1="select promedio from vehiculos where tipo='bus'";
$consulta1 = mysqli_query ($conexion, $resA1) or die ("Fallo en la consulta1");
while($nfilas=mysqli_fetch_array($consulta1)){
  $cnta1=$nfilas['promedio'];
}
$resA2="select promedio from vehiculos where tipo='motocicletas'";
$consulta2 = mysqli_query ($conexion, $resA2) or die ("Fallo en la consulta2");
while($nfilas2=mysqli_fetch_array($consulta2)){
  $cnta2=$nfilas2['promedio'];
}
$resA3="select promedio from vehiculos where tipo='motos'";
$consulta3 = mysqli_query ($conexion, $resA3) or die ("Fallo en la consulta3");
while($nfilas3=mysqli_fetch_array($consulta3)){
  $cnta3=$nfilas3['promedio'];
}
$resA4="select promedio from vehiculos where tipo='buses'";
$consulta4 = mysqli_query ($conexion, $resA4) or die ("Fallo en la consulta4");
while($nfilas4=mysqli_fetch_array($consulta4)){
  $cnta4=$nfilas4['promedio'];
}
$resA5="select promedio from vehiculos where tipo='taxi_normal'";
$consulta5 = mysqli_query ($conexion, $resA5) or die ("Fallo en la consulta5");
while($nfilas5=mysqli_fetch_array($consulta5)){
  $cnta5=$nfilas5['promedio'];
}
$resA6="select promedio from vehiculos where tipo='taxi_ejecutivo'";
$consulta6 = mysqli_query ($conexion, $resA6) or die ("Fallo en la consulta6");
while($nfilas6=mysqli_fetch_array($consulta6)){
  $cnta6=$nfilas6['promedio'];
}
$resA7="select promedio from vehiculos where tipo='taxi_informal'";
$consulta7 = mysqli_query ($conexion, $resA7) or die ("Fallo en la consulta7");
while($nfilas7=mysqli_fetch_array($consulta7)){
  $cnta7=$nfilas7['promedio'];
}
$resA8="select promedio from vehiculos where tipo='metrovia'";
$consulta8 = mysqli_query ($conexion, $resA8) or die ("Fallo en la consulta8");
while($nfilas8=mysqli_fetch_array($consulta8)){
  $cnta8=$nfilas8['promedio'];
}
$resA9="select promedio from vehiculos where tipo='ciclismo'";
$consulta9 = mysqli_query ($conexion, $resA9) or die ("Fallo en la consulta9");
while($nfilas9=mysqli_fetch_array($consulta9)){
  $cnta9=$nfilas9['promedio'];
}

//presentacion de datos
while($nfila1=mysqli_fetch_array($consulta1)){
  $a1="{ name:'".$nfila1['tipo']."', y:".$cnt1."},";
}
while($nfila2=mysqli_fetch_array($consulta2)){
  $a2="{ name:'".$nfila2['tipo']."', y:".$cnt2."},";
}
while($nfila3=mysqli_fetch_array($consulta3)){
  $a3="{ name:'".$nfila3['tipo']."', y:".$cnt3."},";
}
while($nfila4=mysqli_fetch_array($consulta4)){
  $a4="{ name:'".$nfila4['tipo']."', y:".$cnt4."},";
}
while($nfila5=mysqli_fetch_array($consulta5)){
  $a5="{ name:'".$nfila5['tipo']."', y:".$cnt5."},";
}
while($nfila6=mysqli_fetch_array($consulta6)){
  $a6="{ name:'".$nfila6['tipo']."', y:".$cnt6."},";
}
while($nfila7=mysqli_fetch_array($consulta7)){
  $a7="{ name:'".$nfila7['tipo']."', y:".$cnt7."},";
}
while($nfila8=mysqli_fetch_array($consulta8)){
  $a8="{ name:'".$nfila8['tipo']."', y:".$cnt8."},";
}
while($nfila9=mysqli_fetch_array($consulta9)){
  $a9="{ name:'".$nfila9['tipo']."', y:".$cnt9."},";
}



?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cantidad de Transporte</title>
		<style type="text/css">
		</style>
	</head>
	<body>
<script src="highgraphics\code\highcharts.js"></script>
<script src="highgraphics\code\modules\exporting.js"></script>
<script src="highgraphics\code\modules\export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null, 
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Cantidad de Transporte Urbano, Mayo 2018'
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
        data: [{  
            name: 'Buses',
              y: 19.39,
            sliced: true,
            selected: true
        }, {
            name: 'Motocicletas',
            y: 13.51
        }, {
            name: 'Motos',
            y: 8.11
        }, {
            name: 'Buses Escolares',
            y: 11.82
        }, {
            name: 'Taxi Normal',
            y: 16.89
        }, {
            name: 'Taxi Executivo',
            y: 11.96
        }, {
            name: 'Taxi Informal',
            y: 13.18
        }, {
            name: 'Metrovia',
            y: 0.68
        }, {
            name: 'Ciclismo',
            y: 5.14
        }]
    }]
});
		</script>
	</body>
</html>
