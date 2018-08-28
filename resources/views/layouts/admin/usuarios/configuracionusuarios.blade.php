@extends('layouts.admin.base')

@section('title', 'Configuracion Usuarios')

@section('content')


  <div class="">
    <div class="page-title">
      <div class="title_left">
        	<h3>Configuración de Usuarios</h3>
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

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Configuración Rápida</h2>
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
           <!-- <p>Ingrese la clave del u</p>-->
            <div id="js_configUs" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                <li>
                  <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                                      Paso 1<br />
                                      <small>Ingreso de Clave </small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                                      Paso 2 <br />
                                      <small>Configuración en datos</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                                      Paso 3 <br />
                                      <small>Confirmación</small>
                                  </span>
                  </a>
                </li>
                
              </ul>
              <div id="step-1">
                <form class="form-horizontal form-label-left" action="/admin/usuarios/userconfig" method="get" id="step-1f">
                  <div class="form-group">
                    <label class="control-label col-md-5 col-sm-3 col-xs-12">Clave de Usuario<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input id="clave_us" class="date-picker form-control col-md-0 col-xs-12" required="required" type="text">
                    </div>
                  </div>
               </form>
              </div>

              <div id="step-2">
                <form class="form-horizontal form-label-left">
                	<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nick Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="Nick_name" required="Nick_name" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombres <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nombres_us" required="nombres_us" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="apellido_us" name="apellido_us" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="telef_us" class="form-control col-md-7 col-xs-12" type="text" name="telef_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="E-mail_us" class="form-control col-md-7 col-xs-12" type="text" name="E-mail_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Género</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="gender" value="male"> &nbsp; Masculino &nbsp;
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="gender" value="female"> Femenino
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Antigua Contraseña<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="Old_pass_us" class="form-control col-md-7 col-xs-12" name="Old_pass_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nueva Contraseña<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="New_pass_us" class="form-control col-md-7 col-xs-12" type="password" name="New_pass_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir Contraseña<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="Re_New_pass_us" class="form-control col-md-7 col-xs-12" type="password" name="Re_New_pass_us">
                    </div>
                  </div>
                </form>
              </div>


              <div id="step-3">	
                <h2 class="StepTitle">Confirmación</h2>
                <form class="form-horizontal form-label-left">
                <div class="form-group ">
  					       <label "control-label col-md-8 col-sm-3 col-xs-5" >
    					         <input type="checkbox" value="">
    					           Acepto que la información presentada en este formulario es verídica y está correctamente escrita. 
  					       </label>
				        </div>
				        </form>
              </div>
            </div>  
         </div> 
        </div>
      </div>
    </div>
  </div>
<!--Configuracion  de usuarios-->
    <script src="{{ asset('vendors/jQuery-Smart-Wizard/js/co_us.js') }}"></script> 
@endsection