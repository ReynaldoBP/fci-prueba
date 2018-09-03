@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')


@section('content')

   <div class=" " role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Presentacion de informe de tráfico vehicular </h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar por...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Gráfica diaria  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a> 
                       <ul class="dropdown-menu" role="menu">  
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

        <!--Cabecera-------->
<!-- <html>
<title>Analisis</title>
    <body>
        <h2>Analisis</h2> -->
        <form id="formulario"  enctype="application/x-www-form-urlencoded">
        Fecha Inicial:&nbsp; <input id="fecha1" type="date" name="fecha1" min="2018-07-01" max="2018-08-31"><br>
        Fecha Final:&nbsp; <input id="fecha2" type="date" name="fecha2" min="2018-07-01" max="2018-08-31"><br>
        Hora: &nbsp;<input type="time" name="hora1" min="08:00" max="19:00" step="3600"><br>
        </form>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>
            $(document).on('ready',function(){
                $('#btn-ingresar').click(function(){
                var url ="start.blade.php" //"{{ url('admin/analisis/inteligencia') }}";                                     
                $.ajax({                        
                type: "POST",                 
                url: url,                    
                data: $("#formulario").serialize(),
                success: function(data)            
                {
             $('#resp').html(data);           
           }
         });
      });
    });
    </script>
 <form action="/admin/analisis/inteligencia/g_diaria" method="post" enctype="application/x-www-form-urlencoded">
 	@csrf
<input name="grafico" type=button id="btn-ingresar" value='Mostrar Grafica' />
<input type="button" value="Recargar página" onClick="location.reload();" />
        </form>
<div id="resp"></div>
                <td class="pad-basic"><div id="resp2"></div></td>
 <script language="javascript">
function otra_ventana(direccion) {
window.onload=(direccion);
}
</script>
<!--     </body>
</html> -->
</div>
          </div>
	<!--</body>
</html> -->
@endsection 
