<?php
$conexion=mysqli_connect('localhost','root','','bd_trafico');
    switch(($_POST['anio'])){
		case '2016':{
            $p6="ESTO ES 2016";
            echo $P6;
        }break;
            case '2017':{
            $p7="ESTO ES 2017";
            echo $p7;
        }break;
            case '2018':{
            $p8="ESTO ES 2018";
            echo $p8;
        }break;
    }
?>
<html>
    <head></head>
    <title></title>
    <body>
<a href="combo.php">Regresar</a>
        </body>
</html>