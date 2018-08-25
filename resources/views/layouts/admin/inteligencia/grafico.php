<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<script src="C:\xampp\htdocs\grafico/code/highcharts.js"></script>
<script src="C:\xampp\htdocs\grafico/code/modules/exporting.js"></script>
<script src="C:\xampp\htdocs\grafico/code/modules/export-data.js"></script>

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
        text: 'Browser market shares in January, 2018'
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
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Bus Escolar',
            y: 19.39,
            sliced: true,
            selected: true
        }, {
            name: 'Motocicletas',
            y:<? echo $nfilas;?>,
        }, {
            name: 'Motos',
            y: 8.11
        }, {
            name: 'Buses',
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
