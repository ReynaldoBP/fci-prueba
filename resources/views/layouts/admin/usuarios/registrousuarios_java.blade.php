@extends('layouts.admin.base')

@section('title', 'Registro de usuarios')

@section('content')
  
<!--LOCALES DE LA PAGINA ACTUAL----->
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
<!--/LOCALES--->

<!-- page content -->

        <div class=" " role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Registro de usuarios </h3>
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
                    <h2><i class="fa fa-bars"></i> Modo de Registro </h2>
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
                  <!-- PESTAÑAS INICIO ------------------------------------------>
                  <div class="x_content">
                      <!-- PESTAÑAS TITULOS ------------------------------------------>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Por Usuario</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Por Grupo</a>
                        </li>                       
                      </ul>
                        <!-- PESTAÑAS CONTENIDO ------------------------------------------>
                          <!-- PESTAÑA INGRESO UN USUARIO ------------------------------------------>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <p>Proporcione los datos del nuevo usuario</p>

                          <!-- wizard 1RA pestaña ------------------------------------------>
                         <div id="js_reg_us" class="form_wizard wizard_horizontal prueba">
                            <ul class="wizard_steps">
                              <li>
                              <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                      Paso 1<br /><small>Ingreso</small>
                                </span>
                              </a>
                              </li>
                            <li>
                              <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                      Paso 2 <br />
                                      <small>Verificación de Datos</small>
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

              <form class="form-horizontal form-label-left"  id="step-1">            
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" maxlegth="10">Usuario (Cedula) <span class="required">*</span></label>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <input type="text" id="id_us" required="id_us" class="form-control col-md-7 col-xs-12" name="id_us">
                    </div>
                  </div>


                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" maxlegth="10">Nombres <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <input type="text" id="nombres_us" required="nombres_us" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" maxlegth="25">Apellidos <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <input type="text" id="apellido_us" name="apellido_us" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" maxlegth="9">Cargo</label>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <input id="cargo_us" class="form-control col-md-7 col-xs-12" type="text" name="cargo_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" maxlegth="6">Departamento</label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <input id="Dep_us" class="form-control col-md-7 col-xs-12" type="text" name="Dep_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" maxlegth="15">E-mail<span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <input id="E-mail_us" class="form-control col-md-7 col-xs-12" type="text" name="E-mail_us">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Género</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="gender" value="Masculino" id="ra_g_masculino"> &nbsp; Masculino &nbsp;
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="gender" value="Femenino" id="ra_g_femenino"> Femenino
                        </label>
                      </div>
                    </div>
                </div>-->

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" maxlegth="8">Contraseña<span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <input type="password" id="pass_us" class="form-control col-md-7 col-xs-12" name="pass_us">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" maxlegth="8" >Repetir Contraseña<span class="required">*</span></label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <input type="password" id="rep_pass_us" class="form-control col-md-7 col-xs-12" name="rep_pass_us">
                    </div>
                  </div>
              </form>
              <form class="form-horizontal form-label-left"  id="step-2">
                
                  <h1 align = "center">Nuevo Usuario</h1>
                  
                    <div class="col-md-8 col-sm-20 col-xs-12">
                     
                      <h2><label id ="lblId" ></label></h2>
                      <h2><label id ="lblnombre"></label></h2>
                      <h2><label id ="lblApellido"></label></h2>
                      <h2><label id ="lblCargo"></label></h2>
                      <h2><label id ="lblDepartamento"></label></h2>
                      <h2><label id ="lblEmail"></label></h2>
                      <h2><label id ="lblGenero"></label></h2>
                      <h2><label id ="lblPassword"></label></h2>
                     
                    </div>

              </form>
              <form class="form-horizontal form-label-left"  id="step-3">
                <div class="form-group">
                  <h2>paso3 </h2>



                  <form>
                    
                   

                  </form>
                 
                    
            
                
                </div> 

                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                  <label id="lblprueba"> </label>
                  </div> 
              </form>

            </div>
          </div>

          <!-- 2do tab --->
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">   
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">   
                  <div class="x_content">
                    <p>Arrastre su archivo con el listado de usuarios, o de click en el centro para cargarlos.</p>
                    <form action="form_upload.html" class="dropzon"></form> 
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                </div>
              </div>
            </div>
          </div>
                  </div>
                    <!-- PESTAÑAS FINAL ------------------------------------------>
                </div>
              </div>
            </div>       
          </div>
        </div>
        


       <!-- LOCALES BASE 
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
   x Dropzone.js 
    <script src="{{ asset('vendors/dropzone/dist/min/dropzone.min.js') }}"></script>-->
 


    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>

        <!-- /page content -->

 



@endsection