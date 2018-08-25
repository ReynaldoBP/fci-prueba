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
}else{
if($vsida==2018)
{
    $anio='2018';
}}
echo $anio;
$titulo="DEL MES DE $vsm DEL $vsa ";
//GUARDAR VARIABLES DEL MES
$sqlcon2 = "SELECT *  FROM datos WHERE id_anio = '".$vsida."' AND id_mes = '".$vsidm."' ORDER BY id_datos ASC";
    $consultacon2= mysqli_query ($conexioncon2, $sqlcon2) or die ("Fallo en la consulta");
	$nfilascon2= mysqli_num_rows ($consultacon2);
//GUARDAR VARIABLE DEL ANIO

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
                return this.value + '000';
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
        <?php $nombre= "Bus";?>
        name: '<?php echo $nombre; ?>',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 24.5, 18.2, 21.5, 25.2, 22.5, 23.3, 18.3, 13.9, 9.6]

    }, {
        name: 'Motocicletas',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 2.7, 8.5, 11.9, 15.2, 34.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    },{
        name: 'Motos',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 15.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 8.3, 6.6, 12.8]
    },{
        name: 'Buses Escolar',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    },{
        name: 'Taxi Normal',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    },{
        name: 'Taxi Ejecutivo',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 15.7, 13.5, 15.9, 22.2, 19.1, 26.6, 24.2, 10.3, 6.6, 4.8]
    },{
        name: 'Taxi Informal',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 12.2, 17.7, 21.5, 21.9, 25.2, 27.0, 26.6, 2.3,  4.2, 10.3, 6.6]
    },{
        name: 'Ciclismo',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 6.2, 7.7, 18.5, 15.9, 15.2, 17.0, 26.6, 14.2, 10.3, 6.6, 4.8]
    },{
        name: 'Metrovia',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 14.2, 5.7, 18.5, 11.9, 15.2, 7.0, 6.6, 14.2, 10.3, 6.6, 4.8]
    }
    ]}
);
		</script>
        <a href="combo.php"></a>
	</body>
</html>
