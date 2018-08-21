<?php
namespace App\Http\Controllers;

use App\Parametro;
use Request;



class ParametroController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	//presenta el formulario de parametro
		public function listado_parametro()
   {

        $parametros= Parametro::paginate(5);
        
        return view('listados.listado_parametro')->with("parametros", $parametros);
        
    
	}
	
	//presenta el formulario para nuevo parametro
	public function form_nuevo_parametro()
	{

		return view('formularios.form_nuevo_parametro');
	}
	
	
	public function tipoParametro()
	{
	
	  $tiposp = Parametro::query()->whereIn('estado',array('A'))
		->select('tipo_parametro')->distinct()->get();
			
			return view('formularios.form_nuevo_parametro')->with("tiposp", $tiposp);
			
  }
  
 
	
	
	
	//presenta el formulario para nuevo parametro
	public function agregar_nuevo_parametro()
	{
		
		$data=Request::all();		
      	$parametro =new Parametro;
		$parametro->tipo_parametro  =  $data["tipo_parametro"];
		$parametro->estado = $data["estado"];
		$parametro->valor_n1 = $data["valor_n1"];
		$parametro->valor_c1 = $data["valor_c1"];
		$parametro->descripcion = $data["descripcion"];

		$resul= $parametro->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Parámetro Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}
		
		public function form_editar_parametro($id_parametro)
		
	{
		//funcion para cargar los datos de cada parametro en la ficha
		$parametro=Parametro::find($id_parametro);
		$contador=isset($parametro);
		if($contador>0){          
            return view("formularios.form_editar_parametro")->with("parametro",$parametro);   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el parámetro con ese id no existe o fue borrado");  
		}
	}



		public function editar_parametro()
	{

		$data=Request::all();
		$idparametro=$data["id_parametro"];
		$parametro=Parametro::find($idparametro);
		$parametro->tipo_parametro  =  $data["tipo_parametro"];
		$parametro->estado = $data["estado"];
		$parametro->valor_n1=$data["valor_n1"];
		$parametro->valor_c1=$data["valor_c1"];
		$parametro->descripcion=$data["descripcion"];
		
		
		$resul= $parametro->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}




}