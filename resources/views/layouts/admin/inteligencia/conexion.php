<?php
$conn="host='52.38.27.79' port='5432' dbname='bd_trafico' user='postgres' password='admin1234'";
$dbconn=pg_connect($conn)or die('no se pudo conectar a la base de datos:'.pg_last_error());
$a=2;
$q=pg_query("SELECt cantidad FROM datos where id_anio ='".$a."' and id_mes='1'");
//$query=pg_query($q);
//$result = pg_query($conn, "SELECT * FROM DATOS") or die("Error en la consulta SQL");
$registros= pg_num_rows($q);
for ($i=0;$i<$registros;$i++)
{
$row = pg_fetch_array ($q,$i);
echo $row["cantidad"];
}     
?>