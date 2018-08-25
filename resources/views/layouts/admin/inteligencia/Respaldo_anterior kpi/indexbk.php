<?php 
	$conexion=mysqli_connect('localhost','root','','datos');
$conexioncon=mysqli_connect('localhost','root','','bd_trafico');
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
//echo $vsm;
//echo $vsa;
//echo $vsidm;
//echo $vsida;

//////////////////////////////////////////////////////////////////////////////////

//En esta parte se va a jalar los valores de la tabla para mostrar
 $sqlcon = "SELECT *  FROM datos WHERE id_anio = '".$vsida."' AND id_mes = '".$vsidm."' ORDER BY id_datos ASC";
 $consultacon = mysqli_query ($conexioncon, $sqlcon) or die ("Fallo en la consulta");
 $nfilascon = mysqli_num_rows ($consultacon);
    //$sqlmt = "SELECT *  FROM transporte";
   // $consultamt = mysqli_query ($conexion, $sqlmt) or die ("Fallo en la consulta");
	//$nfilasmt = mysqli_num_rows ($consultamt);
    // while($nfilasmt=mysqli_fetch_array($consultamt)){
    
////////////////////////////////////////////////////////////////////////
//if($conexion->mysqli_connect_errno().")".$conexion
//Consulta Base de datos
$resTotal="select * from vehiculos";
$consulta = mysqli_query ($conexion, $resTotal) or die ("Fallo en la consulta");
$nfilas = mysqli_num_rows ($consulta);
$resA1="select tipo, cantidad, promedio from vehiculos where tipo='bus'";
$consulta1 = mysqli_query ($conexion, $resA1) or die ("Fallo en la consulta1");
while($nfilas=mysqli_fetch_array($consulta1)){
  $nom1=$nfilas['tipo'];
  $cnt1=$nfilas['cantidad'];
 // $cnta1=$nfilas['promedio'];
}
$resA2="select tipo, cantidad, promedio from vehiculos where tipo='motocicletas'";
$consulta2 = mysqli_query ($conexion, $resA2) or die ("Fallo en la consulta2");
while($nfilas2=mysqli_fetch_array($consulta2)){
     $nom2=$nfilas2['tipo'];
      $cnt2=$nfilas2['cantidad'];
 // $cnta2=$nfilas2['promedio'];
}
$resA3="select tipo, cantidad, promedio from vehiculos where tipo='motos'";
$consulta3 = mysqli_query ($conexion, $resA3) or die ("Fallo en la consulta3");
while($nfilas3=mysqli_fetch_array($consulta3)){
     $nom3=$nfilas3['tipo'];
      $cnt3=$nfilas3['cantidad'];
 // $cnta3=$nfilas3['promedio'];
}
$resA4="select tipo, cantidad, promedio from vehiculos where tipo='buses'";
$consulta4 = mysqli_query ($conexion, $resA4) or die ("Fallo en la consulta4");
while($nfilas4=mysqli_fetch_array($consulta4)){
     $nom4=$nfilas4['tipo'];
      $cnt4=$nfilas4['cantidad'];
  //$cnta4=$nfilas4['promedio'];
}
$resA5="select tipo, cantidad, promedio from vehiculos where tipo='taxi_normal'";
$consulta5 = mysqli_query ($conexion, $resA5) or die ("Fallo en la consulta5");
while($nfilas5=mysqli_fetch_array($consulta5)){
     $nom5=$nfilas5['tipo'];
      $cnt5=$nfilas5['cantidad'];
 // $cnta5=$nfilas5['promedio'];
}
$resA6="select tipo, cantidad, promedio from vehiculos where tipo='taxi_ejecutivo'";
$consulta6 = mysqli_query ($conexion, $resA6) or die ("Fallo en la consulta6");
while($nfilas6=mysqli_fetch_array($consulta6)){
     $nom6=$nfilas6['tipo'];
      $cnt6=$nfilas6['cantidad'];
  //$cnta6=$nfilas6['promedio'];
}
$resA7="select tipo, cantidad, promedio from vehiculos where tipo='taxi_informal'";
$consulta7 = mysqli_query ($conexion, $resA7) or die ("Fallo en la consulta7");
while($nfilas7=mysqli_fetch_array($consulta7)){
     $nom7=$nfilas7['tipo'];
      $cnt7=$nfilas7['cantidad'];
  //$cnta7=$nfilas7['promedio'];
}
$resA8="select tipo, cantidad, promedio from vehiculos where tipo='metrovia'";
$consulta8 = mysqli_query ($conexion, $resA8) or die ("Fallo en la consulta8");
while($nfilas8=mysqli_fetch_array($consulta8)){
     $nom8=$nfilas8['tipo'];
      $cnt8=$nfilas8['cantidad'];
 // $cnta8=$nfilas8['promedio'];
}
$resA9="select tipo, cantidad, promedio from vehiculos where tipo='ciclismo'";
$consulta9 = mysqli_query ($conexion, $resA9) or die ("Fallo en la consulta9");
while($nfilas9=mysqli_fetch_array($consulta9)){
    $nom9=$nfilas9['tipo'];
    $cnt9=$nfilas9['cantidad'];
   // $cnta9=$nfilas9['promedio'];
}
$total=$cnt1+$cnt2+$cnt3+$cnt4+$cnt5+$cnt6+$cnt7+$cnt8+$cnt9;
$cnta1=($cnt1/$total)*100;
$cnta2=($cnt2/$total)*100;
$cnta3=($cnt3/$total)*100;
$cnta4=($cnt4/$total)*100;
$cnta5=($cnt5/$total)*100;
$cnta6=($cnt6/$total)*100;
$cnta7=($cnt7/$total)*100;
$cnta8=($cnt8/$total)*100;
$cnta9=($cnt9/$total)*100;
//echo $total;
//presentacion de datos
$titulo="CANTIDAD DEL TRANSPORTE URBANO DEL MES DE $vsm DEL $vsa ";
//echo $titulo;
$a1="{ name:'".$nom1."', y:".$cnta1."},";
$a2="{ name:'".$nom2."', y:".$cnta2."},";
$a3="{ name:'".$nom3."', y:".$cnta3."},";
$a4="{ name:'".$nom4."', y:".$cnta4."},";
$a5="{ name:'".$nom5."', y:".$cnta5."},";
$a6="{ name:'".$nom6."', y:".$cnta6."},";
$a7="{ name:'".$nom7."', y:".$cnta7."},";
$a8="{ name:'".$nom8."', y:".$cnta8."},";
$a9="{ name:'".$nom9."', y:".$cnta9."},";
//codigo de combo para ver si funciona la implementacion

///////////////////////////////////////////////////////////////////////

// linea original de highchart <div id="container" style="min-width: 310px; height: 350px; max-width: 500px; margin: 0 auto"></div>
//////////////////////////////////////////////////////////////////
//tener en cuenta que aqui se va a generar un while para mostrar
$sqlcon = "SELECT *  FROM datos WHERE id_anio = '".$vsida."' AND id_mes = '".$vsidm."' ORDER BY id_datos ASC";
    $consultacon= mysqli_query ($conexioncon, $sqlcon) or die ("Fallo en la consulta");
	$nfilascon= mysqli_num_rows ($consultacon);
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
                while($nfilascon=mysqli_fetch_array($consultacon)){
                echo "{ name:'".$nfilascon['transporte']."', y:".$nfilascon['cantidad']."},";
                }?>
            
        ]
    }]
});
		</script>
        
    
    </body>
</html>
