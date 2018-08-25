<?php
$conn_string="host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
$dbconn=pg_connect($conn_string)or die('no se pudo conectar a la base de datos:'.pg_last_error());
?>