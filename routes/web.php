<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('', function () {
    return view('index');
});


Route::get('servicios', function () {
    return view('servicios');
});


Route::get('contactos', function () {
    return view('contactos');
});

Route::get('mantenimiento', function () {
    return view('mantenimiento');
		

});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::get('admin', 'AdminController@index');
Route::get('admin/indicadores/indicadores', 'AdminController@indicadores');
Route::get('admin/roles/configuracion', 'AdminController@RolesConfiguracion');
Route::get('admin/roles/registro', 'AdminController@RolesRegistro');
Route::get('admin/usuarios/asignacion', 'AdminController@UsuariosAsignacion');
Route::get('admin/usuarios/configuracion', 'AdminController@UsuariosConfiguracion');
Route::get('admin/usuarios/registro', 'AdminController@UsuariosRegistro');

Route::get('admin/analisis/ajax_python_analisis1', 'AdminController@ajax_python_analisis1');
Route::get('admin/analisis/ajax_python_analisis2', 'AdminController@ajax_python_analisis2');
Route::get('admin/analisis/ajax_python_analisis3', 'AdminController@ajax_python_analisis3');
Route::get('admin/analisis/ajax_python_analisis4', 'AdminController@ajax_python_analisis4');

Route::get('admin/analisis/seleccion', 'AdminController@SeleccionPuntos');
Route::get('admin/analisis/registro', 'AdminController@RegistroPuntos');
Route::get('admin/analisis/trayectoria', 'AdminController@TrayectoriaPuntos');

Route::get('admin/analisis/ajax_carga_data/{fecha_desde}/{fecha_hasta}', 'AdminController@ajax_carga_data');
Route::get('admin/analisis/ajax_carga_data2/{fecha_desde}', 'AdminController@ajax_carga_data2');

Route::get('admin/analisis/ajax_r_analisis', 'AdminController@ajax_r_analisis');

Route::get('form_nuevo_parametro/{page?}', 'ParametroController@tipoParametro');
Route::get('form_nuevo_parametro', 'ParametroController@form_nuevo_parametro');
Route::post('agregar_nuevo_parametro','ParametroController@agregar_nuevo_parametro');
Route::get('listado_parametro/{page?}', 'ParametroController@listado_parametro');
Route::get('form_editar_parametro/{id_parametro}', 'ParametroController@form_editar_parametro');
Route::post('editar_parametro', 'ParametroController@editar_parametro');

//Nueva ruta: post' registro de usuario en la BD//
Route::post('admin/usuarios/registro','AdminController@UsuariosRegistro_ajax_jquerty' );
//Muestra el listado de usuarios creados
Route::get('admin/usuarios/lregistro','AdminController@LiUsuariosRegistro' );
 
 //rutas de KPI
Route::post('admin/analisis/inteligencia', 'AdminController@inteligenciapost');
Route::get('admin/analisis/inteligencia', 'AdminController@inteligencia');
Route::get('admin/analisis/inteligencia/comparacion_mensual','AdminController@inteligenciaComparacion' );
Route::get('admin/analisis/inteligencia/g_anual','AdminController@inteligenciaGrafico' );
Route::post('admin/analisis/inteligencia/g_mensual','AdminController@inteligenciag_mensual' );

//editar usuarios
Route::get('admin/usuarios/userconfig','AdminController@edit_usuario' );
Route::get('admin/analisis/ajax_guardar_gye/{lat}/{long}/{fecha_desde}/{tipo_vehiculo}/{sector}/{velocidad}', 'AdminController@ajax_guardar_gye');
Route::post('admin/analisis/ajax_carga_data_insert', 'AdminController@ajax_carga_data_insert');
Route::post('admin/analisis/ajax_carga_data_insert2', 'AdminController@ajax_carga_data_insert2');
Route::get('admin/analisis/ajax_r_analisis/{usuario}/{num_cluster}', 'AdminController@ajax_r_analisis');

Route::get('form_nuevo_parametro/{page?}', 'ParametroController@tipoParametro');
Route::get('form_nuevo_parametro', 'ParametroController@form_nuevo_parametro');
Route::post('agregar_nuevo_parametro','ParametroController@agregar_nuevo_parametro');
Route::get('listado_parametro/{page?}', 'ParametroController@listado_parametro');
Route::get('form_editar_parametro/{id_parametro}', 'ParametroController@form_editar_parametro');
Route::post('editar_parametro', 'ParametroController@editar_parametro');

#carto DB
Route::get('admin/analisis/cartodb1', 'AdminController@cartodb1');
Route::get('admin/analisis/cartodb2', 'AdminController@cartodb2');
Route::get('admin/analisis/cartodb3', 'AdminController@cartodb3');
Route::get('admin/analisis/cartodb4', 'AdminController@cartodb4');
Route::get('admin/analisis/cartodb5', 'AdminController@cartodb5');
Route::get('admin/analisis/cartodb6', 'AdminController@cartodb6');
Route::get('admin/analisis/cartodb7', 'AdminController@cartodb7');
Route::get('admin/analisis/cartodb8', 'AdminController@cartodb8');
Route::get('admin/analisis/cartodb9', 'AdminController@cartodb9');
Route::get('admin/analisis/cartodb10', 'AdminController@cartodb10');
Route::get('admin/analisis/cartodb10', 'AdminController@cartodb11');



#


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');
});
