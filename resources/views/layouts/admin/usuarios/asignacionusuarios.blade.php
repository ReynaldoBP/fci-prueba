@extends('layouts.admin.base')

@section('title', 'Asignacion Roles')

@section('content')

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Asignación de Roles</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                  </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Configuración rápida</h2>
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
          <div class="x_content">


            <!-- Smart Wizard -->
            
            <div id="js_asig_us" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                <li>
                  <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                                      Paso 1<br />
                                      <small>Seleccion de usuario(s)</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                                      Paso 2<br />
                                      <small>Configuración de roles</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                                      Paso 3<br />
                                      <small>Selección de funciones</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-4">
                    <span class="step_no">4</span>
                    <span class="step_descr">
                                      Paso 4<br />
                                      <small>Confirmación de los datos</small>
                                  </span>
                  </a>
                </li>
              </ul>
              
		  <form class="form-horizontal form-label-left">
		  	<div id="step-1">
		  		<h2 class="StepTitle">Selección de Usuario(s)</h2>
              	<script languaje="javascript">
					function un_usuario(form)
					{
    						/*form.txtClave_us.style.display = "inline";
    						form.lblClave_us.style.display = "inline"; 
    						form.lbl_G_us.style.display = "none"; 
    						form.opc_G_us.style.display = "none"; style="display:none"*/
    						form.txtClave_us.disabled = false;
    						form.opc_G_us.disabled = true;
    						form.rd_g_us.checked=false;
    				}
    				function Grupo_usuarios(form)
    					{
    						/*form.txtClave_us.style.display = "none";
    						form.lblClave_us.style.display = "none"; 
    						form.lbl_G_us.style.display = "inline"; 
    						form.opc_G_us.style.display = "inline"; style="display:none"*/
    						form.txtClave_us.disabled = true;
    						form.opc_G_us.disabled = false;
							form.rd_1_us.checked=false;
    					}				
				</script>

				<div class="radio">
					<span class="input-group-addon">
 					<label>
   						 <input type="radio"  name="rd_1_us" id="rd_1_us"  onClick="un_usuario(this.form)"  checked="checked">

    						Usuario único                            
  					</label>
  					</span>
				</div>
				<p></p> <!--Espacio-->
				<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"  id="lblClave_us" name="lblClave_us" >Clave de Usuario <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="txtClave_us" required="required" class="form-control col-md-7 col-xs-12"  >
                    </div>
                 </div>

				<div class="radio">
					<span class="input-group-addon">
 					<label>
    					<input type="radio" name="rd_g_us" id="rd_g_us"  onClick="Grupo_usuarios(this.form)"  >
    						Por departamento
  					</label>
  					</span>
				</div>
				<p></p> <!--Espacio-->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" id="lbl_G_us" name="lbl_G_us" >Departamento</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                

                      <select id="opc_G_us" name="opc_G_us" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled"> 
							<OPTION VALUE="link pagina 1">Operadores</OPTION>
							<OPTION VALUE="link pagina 2">Gerencia</OPTION>
							<OPTION VALUE="link pagina 3">Gerencia administrtiva</OPTION>
							<OPTION VALUE="link pagina 4">Super-Usuarios</OPTION>
                        </select> 
                    </div>
                     </form>
                  </div> 
               
			
              </div>
			
				<form class="form-horizontal form-label-left">
                  
               </form>



 			<form class="form-horizontal form-label-left">
              <div id="step-2">
                <h2 class="StepTitle">Configuración de roles</h2>

                <div class="form-group">
                    <label class="control-label col-md-5 col-sm-3 col-xs-12">Nombres de Usuario<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input id="clave_us" class="date-picker form-control col-md-0 col-xs-12" required="required" type="text" disabled="true" >
                    </div>
                  </div>
				<div class="form-group">
                    <label class="control-label col-md-5 col-sm-3 col-xs-12">Rol Actual<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input id="rol_ac" class="date-picker form-control col-md-0 col-xs-12" required="required" type="text" disabled="true" >
                    </div>
                  </div>
				<div class="form-group">
                  
                  	<label class="control-label col-md-3 col-sm-3 col-xs-5" id="lbl_G_us" name="lbl_G_us" >Listado de roles</label>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="opc_G_us" name="opc_G_us" required="required" class="form-control col-md-0 col-xs-5"> 
							<OPTION VALUE="link pagina 1">SUPER ADMINISTRADOR</OPTION>
							<OPTION VALUE="link pagina 2">ADMINISTRADOR DE RECOLECCION</OPTION>
							<OPTION VALUE="link pagina 3">ADMINISTRADOR DE ANALISIS</OPTION>
							<OPTION VALUE="link pagina 4">ADMINISTRADOR DE PLANIFICACIÓN</OPTION>
              <OPTION VALUE="link pagina 4">RECOLECTOR</OPTION>
              <OPTION VALUE="link pagina 4">ANALISTA</OPTION>
              <OPTION VALUE="link pagina 4">PLANIFICADOR</OPTION>
              <OPTION VALUE="link pagina 4">CONSULTOR</OPTION>
                        </select> 
                    </div>
                </div>
              </div>
             </form>

              <div id="step-3">
                <h2 class="StepTitle">Selección de Funciones</h2>
                
 					<form class="form-horizontal form-label-left">
                  		<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 1
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 2
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 3
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 4
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 5
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 6
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 7
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 8
							</label>
              			</div>

              			<div class="form-group col-md-3 col-sm-6 col-xs-12">
                			<label class="checkbox-inline">
  								<input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Funcion 9
							</label>
              			</div>
              		</form>
              <div id="step-4">
                <h2 class="StepTitle">Step 4 Content</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                  in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                  in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>

            <!-- End SmartWizard Content -->
        </div>
      </div>
    </div>
  </div>

@endsection