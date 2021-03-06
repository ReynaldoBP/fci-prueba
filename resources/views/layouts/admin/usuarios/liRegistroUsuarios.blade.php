@extends('layouts.admin.base')

@section('title', 'Registro de usuarios li')

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
                    <h2><i class="fa fa-bars"></i> Modo de Registro - Listado Actual</h2>
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
                  <form>
                    <h1 align="center"> Usuario creado </h1>
                    <table  5px solid align="center" class="table">
                      
                      <tr>
                        <td>NikName</td>
                        <td>Nombres</td>
                        <td>Cargo</td>
                        <td>Departamento</td>
                        <td>Password</td>
                      </tr>

                      <tr>
                        <td>{{$Nme}}</td>
                        <td>{{$Nombres}}</td>
                        <td>{{$Cargo}}</td>
                        <td>{{$Departamento}}</td>
                        <td>{{$Password}}</td>
                      </tr>
                    </table>
                   <div class="form-group">
                     
                  </div>   
          
                  </form>                 
                 </div>
                </div>                
              </div>
            </div>
            </div>       
          </div>
        
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>

        <!-- /page content -->

@endsection