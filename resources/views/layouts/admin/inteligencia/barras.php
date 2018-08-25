<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Transporte por Via</title>

		<style type="text/css">
#container {
	min-width: 250px;
	max-width: 800px;
	height: 400px;
	margin: 1 auto
}
		</style>
	</head>
	<body>
<script src="highgraphics/code/highcharts.js"></script>
<script src="highgraphics/code/modules/series-label.js"></script>
<script src="highgraphics/code/modules/exporting.js"></script>
<script src="highgraphics/code/modules/export-data.js"></script>

<div id="container"></div>



		<script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Transito Vehicular Zona Centro '
    },

    subtitle: {
        text: 'Av Quito 07:00 - 09:00'
    },

    yAxis: {
        title: {
            text: 'Numeros de Transporte'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 700
        }
    },

    series: [{
        name: 'Auto Particular ',
        data: [3934, 2503, 7177, 9658, 7031, 9931, 7133, 4175]
    }, {
        name: 'Buses',
        data: [4916, 4064, 4742, 9711, 2490, 1282, 8121, 2434]
    }, {
        name: 'Taxi',
        data: [1744, 1722, 6005, 9771, 5185, 4377, 2147, 9387]
    }, {
        name: 'Metrovia',
        data: [2356, 4683, 7988, 2169, 5112, 2452, 4400, 4227]
    }, {
        name: 'Moto',
        data: [1298, 5948, 8105, 1248, 8989, 1816, 8274, 1111]
    },{
        name: 'Camion',
        data: [2467, 2367, 7988, 2169, 5112, 2452, 4400, 3227]
    },{
        name: 'Camioneta',
        data: [1699, 2478, 7748, 2169, 5112, 1452, 3600, 4784]
    },{
        name: 'Expreso',
        data: [2683, 1356, 7988, 2169, 5112, 2452, 4400, 4227]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
	</body>
</html>
