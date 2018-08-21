@extends('layouts.admin.base')


 
    <title>Mantenimiento Parámetros</title>
    


  <div class="hold-transition-mantenimiento skin-blue-mantenimiento sidebar-mini-mantenimiento";>  

    <div class="content-wrapper-mantenimiento">


      <aside class="main-sidebar-mantenimiento nav">
	  
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar-mantenimiento" >

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu-mantenimiento">
           <li class="active-mantenimiento treeview">
              <a href="#">
                <i></i> <span>Panel de control</span> <i></i>
              </a>
              <ul class="treeview-menu">
                <li class="active-mantenimiento"><a href="javascript:void(0);" onclick="cargarformulario(1);" ><i class="fa fa-circle-o"></i>Agregar Parámetro </a></li>
                <li class="active-mantenimiento"><a href="javascript:void(0);" onclick="cargarlistado(1,1);cargarTipo();" ><i class="fa fa-circle-o"></i>Listado Parámetros</a></li>
              </ul>
            </li>
			
    
          </ul>
        </section>
	
        <!-- /.sidebar -->
      </aside>
	
@section('content')
      <!-- Content Wrapper. Contains page content -->
	  <div class="col-md-9">
      <div class="content-wrapper-mantenimiento x_panel" style="min-height:600px !important;">
        <!-- Content Header (Page header) -->
       <section> 
	   <div>&nbsp;</div>
	   
		<h3>Mantenimiento de <span>Parámetros</span></h3>
		</section>
         <!-- contenido capas modales -->

      <section> 
         <div id="capa_modal" class="div_modal" ></div>
         <div id="capa_para_edicion" class="div_contenido" > <div>
      </section>

       

        <!-- contenido principal -->
        <section class="content-mantenimiento"  id="contenido_principal">
        
        </section>
    @stop
      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
            <br>

         <img src="img/images/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#00000"> Cargando ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>

      </div><!-- /.content-wrapper -->
       
    </div><!-- ./wrapper -->
	    <!-- Theme style -->
		
</div>
	<link rel="stylesheet" href="css/css_mantenimiento/AdminLTE.css">
	
    <!-- AdminLTE Skins. -->
    <link rel="stylesheet" href="css/css_mantenimiento/_all-skins.css">	
    <link rel="stylesheet" href="css/css_mantenimiento/mant_parametros.css">

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	 

    <script>  $("#content-wrapper-mantenimiento").css("min-height","400px"); </script>
   
 <!-- javascript del sistema laravel -->
   <script src="js/mant_parametros.js"></script>



