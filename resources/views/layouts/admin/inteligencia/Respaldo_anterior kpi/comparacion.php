<?php
$conexion=mysqli_connect('localhost','root','','datos');
$conexioncon=mysqli_connect('localhost','root','','bd_trafico');
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
echo $vsm;
echo $vsa;
echo $vsidm;
echo $vsida;
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
$sqlcon = "SELECT *  FROM anio WHERE id_anio = '".$ia."'";
$consultacon= mysqli_query ($conexioncon, $sqlcon) or die ("Fallo en la consulta");
$nfilascon= mysqli_num_rows ($consultacon);
$sqlcon1 = "SELECT *  FROM anio WHERE id_anio = '".$ia2."'";
$consultacon1= mysqli_query ($conexioncon, $sqlcon1) or die ("Fallo en la consulta");
$nfilascon1= mysqli_num_rows ($consultacon1);
//sacar tabla descripcionde tipo de vehiculos
$cant="SELECT * FROM datos WHERE id_anio = 2 AND id_mes='".$vsidm."'";
$ccant= mysqli_query ($conexioncon, $cant) or die ("Fallo en la consulta");
$nfcant= mysqli_num_rows ($ccant);
///////////////////////
$cant1="SELECT * FROM datos WHERE id_anio = 3 AND id_mes='".$vsidm."'";
$ccant1= mysqli_query ($conexioncon, $cant1) or die ("Fallo en la consulta");
$nfcant1= mysqli_num_rows ($ccant1);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tabla Comparativa por Año</title>

		<style type="text/css">

		</style>
	</head>
	<body> 
<script src="highgraphics\code\highcharts.js"></script>
<script src="highgraphics\code\modules\exporting.js"></script>
<script src="highgraphics\code\modules\export-data.js"></script>

<div id="container" style="min-width: 310px; max-width: 750px; height: 350px; margin: 10"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Comparacion por Año del Mes de <?php  echo $vsm; ?>'
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
            text: 'Cantidad de Transporte por Mil',
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
         while($nfcant=mysqli_fetch_array($ccant)){
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
         while($nfcant1=mysqli_fetch_array($ccant1)){
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
	</body>
</html>
