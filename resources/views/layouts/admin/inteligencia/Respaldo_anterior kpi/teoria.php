<html>
	<head>
		<title>Highcharts Example</title>
	</head>
	<body>
        <?php 
        $cont=0;
        $conexioncon=mysqli_connect('localhost','root','','bd_trafico');
        $cant="SELECT * FROM datos WHERE id_anio = '2' AND id_mes='1'";
$ccant= mysqli_query ($conexioncon, $cant) or die ("Fallo en la consulta");
$nfcant= mysqli_num_rows ($ccant);
        echo "data:"; ?>[<?php 
        while($nfcant=mysqli_fetch_array($ccant)){
            if($cont<7)
            { echo $nfcant['cantidad']; $cont++; ?>,<?php
            
            }else{
               echo $nfcant['cantidad'];; 
            }
        }
        ?>]
        <p></p>
	</body>
</html>
