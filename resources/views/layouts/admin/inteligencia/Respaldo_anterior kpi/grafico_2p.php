<?php
$conexion=mysqli_connect('localhost','root','','datos');
$conexioncon2=mysqli_connect('localhost','root','','bd_trafico');
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

$titulo="DEL AÑO $vsa ";

////////////////////////////////////////AUTO PARTICULAR/////////////////////////////
$sqlconap = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 1 and id_mes >= 1 and id_mes <=11";
$consultaconap= mysqli_query ($conexioncon2, $sqlconap) or die ("Fallo en la consulta");
$nfilasconap= mysqli_num_rows ($consultaconap);
/////////////////////////////////////////////////////////////////////
$sqlconap1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 1 and id_mes = 12";
$consultaconap1= mysqli_query ($conexioncon2, $sqlconap1) or die ("Fallo en la consulta");
$nfilasconap1= mysqli_num_rows ($consultaconap1);
////////////////////////////////BUSES/////////////////////////////////////
$sqlconb = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 2 and id_mes >= 1 and id_mes <=11";
$consultaconb= mysqli_query ($conexioncon2, $sqlconb) or die ("Fallo en la consulta");
$nfilasconb= mysqli_num_rows ($consultaconb);
/////////////////////////////////////////////////////////////////////
$sqlconb1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 2 and id_mes = 12";
$consultaconb1= mysqli_query ($conexioncon2, $sqlconb1) or die ("Fallo en la consulta");
$nfilasconb1= mysqli_num_rows ($consultaconb1);
////////////////////////////////TAXI/////////////////////////////////////
$sqlcont = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 3 and id_mes >= 1 and id_mes <=11";
$consultacont= mysqli_query ($conexioncon2, $sqlcont) or die ("Fallo en la consulta");
$nfilascont= mysqli_num_rows ($consultacont);
/////////////////////////////////////////////////////////////////////
$sqlcont1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 3 and id_mes = 12";
$consultacont1= mysqli_query ($conexioncon2, $sqlcont1) or die ("Fallo en la consulta");
$nfilascont1= mysqli_num_rows ($consultacont1);
//////////////////////////////////METROVIA///////////////////////////////////
$sqlconme = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 4 and id_mes >= 1 and id_mes <=11";
$consultaconme= mysqli_query ($conexioncon2, $sqlconme) or die ("Fallo en la consulta");
$nfilasconme= mysqli_num_rows ($consultaconme);
/////////////////////////////////////////////////////////////////////
$sqlconme1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 4 and id_mes = 12";
$consultaconme1= mysqli_query ($conexioncon2, $sqlconme1) or die ("Fallo en la consulta");
$nfilasconme1= mysqli_num_rows ($consultaconme1);
//////////////////////////////////////MOTO///////////////////////////////
$sqlconmo = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 5 and id_mes >= 1 and id_mes <=11";
$consultaconmo= mysqli_query ($conexioncon2, $sqlconmo) or die ("Fallo en la consulta");
$nfilasconmo= mysqli_num_rows ($consultaconmo);
/////////////////////////////////////////////////////////////////////
$sqlconmo1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 5 and id_mes = 12";
$consultaconmo1= mysqli_query ($conexioncon2, $sqlconmo1) or die ("Fallo en la consulta");
$nfilasconmo1= mysqli_num_rows ($consultaconmo1);
//////////////////////////////////////CAMION///////////////////////////////
$sqlconc = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 6 and id_mes >= 1 and id_mes <=11";
$consultaconc= mysqli_query ($conexioncon2, $sqlconc) or die ("Fallo en la consulta");
$nfilasconc=mysqli_num_rows ($consultaconc);
/////////////////////////////////////////////////////////////////////
$sqlconc1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 6 and id_mes = 12";
$consultaconc1= mysqli_query ($conexioncon2, $sqlconc1) or die ("Fallo en la consulta");
$nfilasconc1= mysqli_num_rows ($consultaconc1);
//////////////////////////////////////CAMIONETA///////////////////////////////
$sqlconca = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 7 and id_mes >= 1 and id_mes <=11";
$consultaconca= mysqli_query ($conexioncon2, $sqlconca) or die ("Fallo en la consulta");
$nfilasconca= mysqli_num_rows ($consultaconca);
/////////////////////////////////////////////////////////////////////
$sqlconca1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 7 and id_mes = 12";
$consultaconca1= mysqli_query ($conexioncon2, $sqlconca1) or die ("Fallo en la consulta");
$nfilasconca1= mysqli_num_rows ($consultaconca1);
//////////////////////////////////////EXPRESO///////////////////////////////
$sqlconex = "SELECT cantidad from datos where id_anio ='".$vsida."' and id_transporte = 8 and id_mes >= 1 and id_mes <=11";
$consultaconex= mysqli_query ($conexioncon2, $sqlconex) or die ("Fallo en la consulta");
$nfilasconex= mysqli_num_rows ($consultaconex);
/////////////////////////////////////////////////////////////////////
$sqlconex1 = "SELECT cantidad from datos where id_anio = '".$vsida."' and id_transporte = 8 and id_mes = 12";
$consultaconex1= mysqli_query ($conexioncon2, $sqlconex1) or die ("Fallo en la consulta");
$nfilasconex1= mysqli_num_rows ($consultaconex1);
while ($nfilasconap1=mysqli_fetch_array($consultaconap1)){ 
    $dfap=$nfilasconap1['cantidad'];
}
while ($nfilasconb1=mysqli_fetch_array($consultaconb1)){ 
    $dfb=$nfilasconb1['cantidad'];
}
while ($nfilascont1=mysqli_fetch_array($consultacont1)){ 
    $dft=$nfilascont1['cantidad'];
}
while ($nfilasconme1=mysqli_fetch_array($consultaconme1)){ 
    $dfme=$nfilasconme1['cantidad'];
}
while ($nfilasconmo1=mysqli_fetch_array($consultaconmo1)){ 
    $dfmo=$nfilasconmo1['cantidad'];
}
while ($nfilasconc1=mysqli_fetch_array($consultaconc1)){ 
    $dfc=$nfilasconc1['cantidad'];
}
while ($nfilasconca1=mysqli_fetch_array($consultaconca1)){ 
    $dfca=$nfilasconca1['cantidad'];
}
while ($nfilasconex1=mysqli_fetch_array($consultaconex1)){ 
    $dfex=$nfilasconex1['cantidad'];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
        
<script src="highgraphics\code\highcharts.js"></script>
<script src="highgraphics\code\modules\series-label.js"></script>
<script src="highgraphics\code\modules\exporting.js"></script>
<script src="highgraphics\code\modules\export-data.js"></script>

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
        data: [ <?php while ($nfilasconap=mysqli_fetch_array($consultaconap)){ 
        echo $nfilasconap['cantidad']."00,";}
            echo $dfap."00";?>
              ]
    },{
        name: 'Buses' ,  
        marker: {
            symbol: 'circle'
        },
        data: [ <?php while ($nfilasconb=mysqli_fetch_array($consultaconb)){ 
        echo $nfilasconb['cantidad']."00,";}
            echo $dfb."00";?>
              ]
    },{
        name: 'Taxi' ,  
        marker: {
            symbol: 'triangle'
        },
        data: [ <?php while ($nfilascont=mysqli_fetch_array($consultacont)){ 
        echo $nfilascont['cantidad']."00,";}
            echo $dft."00";?>
              ]
    },{
        name: 'Metrovia' ,  
        marker: {
            symbol: 'cross'
        },
        data: [ <?php while ($nfilasconme=mysqli_fetch_array($consultaconme)){ 
        echo $nfilasconme['cantidad']."0,";}
            echo $dfme."0";?>
              ]
    },{
        name: 'Moto' ,  
        marker: {
            symbol: 'diamond'
        },
        data: [ <?php while ($nfilasconmo=mysqli_fetch_array($consultaconmo)){ 
        echo $nfilasconmo['cantidad']."00,";}
            echo $dfmo."00";?>
              ]
    },{
        name: 'Camion' ,  
        marker: {
            symbol: 'triangle-down'
        },
        data: [ <?php while ($nfilasconc=mysqli_fetch_array($consultaconc)){ 
        echo $nfilasconc['cantidad']."00,";}
            echo $dfc."00";?>
              ]
    },{
        name: 'Camioneta' ,  
        marker: {
            symbol: 'square'
        },
        data: [ <?php while ($nfilasconca=mysqli_fetch_array($consultaconca)){ 
        echo $nfilasconca['cantidad']."00,";}
            echo $dfca."00";?>
              ]
    },{
        name: 'Expreso' ,  
        marker: {
            symbol: 'square'
        },
        data: [ <?php while ($nfilasconex=mysqli_fetch_array($consultaconex)){ 
        echo $nfilasconex['cantidad']."00,";}
            echo $dfex."00";?>
              ]
    }
    ]}
);
		</script>
        <a href="combo.php">Regresar</a>
	</body>
</html>
