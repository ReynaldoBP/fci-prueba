<html lang="es">
<body>
<head>
<meta charset="utf-8">
<title> Ejericios </title>
<form method="POST">
 <label for="caja1"> Elemento a Mostrar
        <select name="box">
        <option value="trafico_real" >Trafico en Tiempo Real</option>
        <option value="barras" >Transito Vehicular</option>
        <option value="circulo" >Cantidad de Vehiculos</option>
        </select> 
        <input name="grafico" type="submit" value="Mostrar"/>
    </label>
<?php
    switch(($_POST['box'])){
		case 'trafico_real':
		{
        if(isset($_POST["grafico"])){
        ?>
        <br>Trafico Real
         <script type="text/javascript">
            function registrar(){
            window.location="trafico_real.php";
            }
        </script>
        <?php
        }
        }break;  
        case 'barras':
		{
        if(isset($_POST["grafico"])){
        ?>
        <br>Transito Vehicular
         <script type="text/javascript">
            function registrar(){
            window.location="barras.php";
            }
        </script>
        <?php
        }
        }break;  
        case 'circulo':
		{
        if(isset($_POST["grafico"])){
        ?>
        <br>Cantidad de Vehiculo
         <script type="text/javascript">
            function registrar(){
            window.location="index.php";
            }
        </script>
        <?php
        }
        }break;     
    }?>
</form>
</head>
</body>
</html>