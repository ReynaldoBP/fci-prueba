<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;
use App\Models\Ad_Usuario_Sistema;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
#carto db
    
    public function cartodb1()
    {
        return view('layouts.admin.analisis.cartodb1');
    }
    public function cartodb2()
    {
        return view('layouts.admin.analisis.cartodb2');
    }
    public function cartodb3()
    {
        return view('layouts.admin.analisis.cartodb3');
    }
    public function cartodb4()
    {
        return view('layouts.admin.analisis.cartodb4');
    }
    public function cartodb5()
    {
        return view('layouts.admin.analisis.cartodb5');
    }
    public function cartodb6()
    {
        return view('layouts.admin.analisis.cartodb6');
    }
    public function cartodb7()
    {
        return view('layouts.admin.analisis.cartodb7');
    }
    public function cartodb8()
    {
        return view('layouts.admin.analisis.cartodb8');
    }
    public function cartodb9()
    {
        return view('layouts.admin.analisis.cartodb9');
    }
    public function cartodb10()
    {
        return view('layouts.admin.analisis.cartodb10');
    }
    public function cartodb11()
    {
        return view('layouts.admin.analisis.cartodb11');
    }
    public function index()
    {
        //
        //dd(\App\Ad_Usuario_Sistema::all());
        //$pastel = Ad_Usuario_Sistema::where('jcheverria')->first();
        //$a="1";
        //dd($pastel);
        //return view('layouts.admin.home')->with('a', $a);
        return view('layouts.admin.home');
    }

    public function indicadores()
    {
        //
        return view('layouts.admin.indicadores.indicadores');
    }
    public function RolesConfiguracion()
    {
        //
        return view('layouts.admin.roles.configuracionroles');
    }
    public function RolesRegistro()
    {
        //
        return view('layouts.admin.roles.registroroles');
    }
    public function UsuariosAsignacion()
    {
        //
        return view('layouts.admin.usuarios.asignacionusuarios');
    }
    public function UsuariosConfiguracion()
    {
        //
        return view('layouts.admin.usuarios.configuracionusuarios');
    }
    public function UsuariosRegistro()
    {
        //
        return view('layouts.admin.usuarios.registrousuarios');
    }
    public function SeleccionPuntos()
    {
        //
        return view('layouts.admin.analisis.analisis');
    }
    public function RegistroPuntos()
    {
        //
        return view('layouts.admin.analisis.registropuntos');
    }   
    public function TrayectoriaPuntos()
    {
        //
        return view('layouts.admin.analisis.trayectoriapuntos');
    }    
    
     public function ajax_carga_data2(Request $request, $fecha_desde)
    {
        $f_desde = $fecha_desde;
        $f_desde_mod=str_replace("T"," ",$f_desde);
        //2009-02-03T12:30
        $cont=0;
        /*LOCAL */
        //$conn_string = "host='localhost' port='5432' dbname='postgres' user='postgres' password='root'";
        /*GYE */
        $conn_string = "host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";
        /*CHINA */
        //$conn_string = "host='52.38.27.79' port='5432' dbname='respaldo' user='postgres' password='admin1234'";
        $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());

        $query_all   ="select id_tipo_vehiculo,latitud,longitud from trayectoria_gye where fecha = '$f_desde_mod'";

        $result_all  = pg_query($query_all);
         
        while($row_all=pg_fetch_row($result_all))
        {
            $arr_latlngs[$cont]=$row_all;
            $cont=$cont+1;
        }
        $myJSON_latlngs = json_encode($arr_latlngs);
        pg_close($dbconn);
        $array = '{"latlngs":'. $myJSON_latlngs.'}';
        $array1=json_decode($array);
         
       return response()->json($array1);
    }
    public function ajax_carga_data(Request $request, $fecha_desde,$fecha_hasta)
    {
        
        $f_desde = $fecha_desde;
        $f_hasta = $fecha_hasta;
        
        $f_desde_mod=str_replace("T"," ",$f_desde);
        $f_hasta_mod=str_replace("T"," ",$f_hasta);
        //2009-02-03T12:30
        $cont=0;
        //$conn_string = "host='localhost' port='5432' dbname='postgres' user='postgres' password='root'";
        $conn_string = "host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";
        $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());

        $query_all   ="select id_tipo_vehiculo,latitud,longitud from trayectoria_gye where fecha >= '$f_desde_mod' and fecha <= '$f_hasta_mod'";

        $result_all  = pg_query($query_all);
        while($row_all=pg_fetch_row($result_all))
        {
          $arr_latlngs[$cont]=$row_all;
          $cont=$cont+1;
        }


        $myJSON_latlngs = json_encode($arr_latlngs);
        pg_close($dbconn);
        $array = '{"latlngs":'. $myJSON_latlngs.'}';

        $array1=json_decode($array);
         
       return response()->json($array1);
    }
    
    public function ajax_r_analisis(Request $request, $usuario, $num_cluster)
    {        
        //exec("Rscript C:/Users/jcheverria/Desktop/Jorge Cheverria/fci/prueba/public/R/analisis_kmeans.R");
        //$test = exec("Rscript /home/kbaque/Archivos\ Kev/UG/Tesis/fci-produccion/public/R/analisis_kmeans1.R $usuario $num_cluster" );
        $test = exec("Rscript /var/www/html/fci-prueba/public/R/analisis_kmeans1.R $usuario $num_cluster" );
        $array1=json_encode($test);
         
       return response($array1);
    }
    public function ajax_guardar_gye(Request $request,$fecha_desde,$lat,$long,$tipo_vehiculo,$sector,$velocidad)
    {
        $f_desde = $fecha_desde;
        $lat = $lat;
        $long = $long;
        $tipo_vehiculo = $tipo_vehiculo;
        $sector = $sector;
        $velocidad = $velocidad;

        switch($velocidad)
        {
        case 1:
            $velocidad = '20';
        break;
        case 2:
            $velocidad = '30';
        break;
        case 3:
            $velocidad = '40';
        break;
        case 4:
            $velocidad = '50';
        break;
        case 5:
            $velocidad = '60';
        break;
        case 6:
            $velocidad = '70';
        break;    
        }
        $f_desde_mod=str_replace("T"," ",$f_desde);
        $f_desde_mod=str_replace("+","",$f_desde);

        $conn_string = "host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";
        $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());
        
        $insert_data="INSERT INTO trayectoria_gye(
            latitud, longitud, velocidad, fecha, id_sector, id_tipo_vehiculo)
        VALUES ('$lat', '$long', '$velocidad', '$f_desde_mod', '$sector', '$tipo_vehiculo')";

        $result_all  = pg_query($insert_data);
        $array1=json_encode($result_all);

        return response()->json($array1);
    }
    public function ajax_python_analisis1()
    {

        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/DBSCAM1.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis2()
    {

        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/kmean.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis3()
    {

        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/HCE.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis4()
    {

        $test1 = exec("python /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/HCNE.py");
        $array11=json_encode($test1);
        return response($array11);
   }     
   public function ajax_python(Request $resquest, $usuario, $cluster,$algoritmo){

        if($algoritmo==1){
        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/kmean.py");
        $a=array();
        $linea = 0;
        $archivo = fopen("/var/www/html/fci-prueba/resources/views/layouts/admin/analisis/data/Kmean/centroides-KmeanCal.csv", "r");
        while (($datos = fgetcsv($archivo, ",")) == true) 
        {
          $num = count($datos);

          $linea++;
          if($linea>1){

          //echo $datos[1];
          
          //echo $datos[2];
          array_push($a,$datos[1]);
          array_push($a,$datos[2]);
          }
        }
        fclose($archivo);
        
        }
        if($algoritmo==2){
        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/DBSCAM1.py");
        $a=array();
        $linea = 0;
        $archivo = fopen("/var/www/html/fci-prueba/resources/views/layouts/admin/analisis/data/DbScan/centroides-dbscanCal.csv", "r");
        while (($datos = fgetcsv($archivo, ",")) == true) 
        {
          $num = count($datos);

          $linea++;
          if($linea>1){

          //echo $datos[1];
          
          //echo $datos[2];
          array_push($a,$datos[1]);
          array_push($a,$datos[2]);
          }
        }
        
        fclose($archivo);
        }
        if($algoritmo==3){
        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/HCE.py");
        $a=array();
        $linea = 0;
        $archivo = fopen("/var/www/html/fci-prueba/resources/views/layouts/admin/analisis/data/HCe/centroides-HCne.csv", "r");
        while (($datos = fgetcsv($archivo, ",")) == true) 
        {
          $num = count($datos);

          $linea++;
          if($linea>1){

          //echo $datos[1];
          
          //echo $datos[2];
          array_push($a,$datos[1]);
          array_push($a,$datos[2]);
          }
        }
        
        fclose($archivo);
        }
        if($algoritmo==4){
        $test1 = exec("python3 /var/www/html/fci-prueba/resources/views/layouts/admin/analisis/HCNE.py");
        $a=array();
        $linea = 0;
        $archivo = fopen("/var/www/html/fci-prueba/resources/views/layouts/admin/analisis/data/HCne/centroides-HCne.csv", "r");
        while (($datos = fgetcsv($archivo, ",")) == true) 
        {
          $num = count($datos);

          $linea++;
          if($linea>1){

          //echo $datos[1];
          
          //echo $datos[2];
          array_push($a,$datos[1]);
          array_push($a,$datos[2]);
          }
        }
        
        fclose($archivo);
        }

        return response($a);
   }
    public function ajax_carga_data_insert()
   {    
       //$conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
       $conn_string = "host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";        
       $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());
       $query_delete   ="DELETE FROM trayectoria_gye_hist";
       $result_delete  = pg_query($query_delete);

       $jObject = $_POST['jObject'];
       $data = json_decode($jObject);

       $obj_us = $_POST['obj_us'];
       $data_us = json_decode($obj_us);
        
       $cont_data=count($data);

       foreach($data as $itemData)
       {           
           $query_all   ="INSERT INTO trayectoria_gye_hist(usuario, latitud, longitud, id_tipo_vehiculo) 
                            VALUES ('". $data_us ."',". $itemData[1] .",". $itemData[2] .",". $itemData[0] .")";
           $result_all  = pg_query($query_all);           
       }
       $array1=json_encode($result_all);
       return response()->json($array1);
   }   
  
  public function ajax_carga_data_insert2()
    {
       //$conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
       $conn_string = "host='52.38.27.79' port='5432' dbname='gye_datoss' user='postgres' password='admin1234'";        
       $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());
       $query_delete   ="DELETE FROM trayectoria_gye_hist";
       $result_delete  = pg_query($query_delete);

       $jObject = $_POST['jObject'];
       $data = json_decode($jObject);

       $obj_us = $_POST['obj_us'];
       $data_us = json_decode($obj_us);
        
       $cont_data=count($data);

       foreach($data as $itemData)
       {           
           $query_all   ="INSERT INTO trayectoria_gye_hist(usuario, latitud, longitud, id_tipo_vehiculo) 
                            VALUES ('". $data_us ."',". $itemData[1] .",". $itemData[2] .",". $itemData[0] .")";
           $result_all  = pg_query($query_all);           
       }
       $array1=json_encode($result_all);
       return response()->json($array1);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



//KPI----------------
public function inteligencia()
    {
        //
        return view('layouts.admin.inteligencia.start');
    }
    public function inteligenciapost()
    {
        //
        return view('layouts.admin.inteligencia.start');
    }
    public function inteligenciaComparacion()
    {
        //
        return view('layouts.admin.inteligencia.comparacion');
    }
    public function inteligenciaGrafico()
    {
        //
        return view('layouts.admin.inteligencia.grafico_2p');
    }
    public function inteligenciag_mensual()
    {
        //
        return view('layouts.admin.inteligencia.indexbk');
    }
     public function inteligenciagdiari()
    {
        //
        return view('layouts.admin.inteligencia.graficac');
    }
    public function inteligenciagdiari_po()
    {
        //
        return view('layouts.admin.inteligencia.graficac');
    }
    public function inteligenciagdiari_po_()
    {
        //
        return view('layouts.admin.inteligencia.prueba1');
    }
//KPI---------------


public function UsuariosRegistro_ajax_jquerty(Request $request)
    {
        //definicion de variables
        $data = $request->all();
        //extaccion del nombre del email como nikname
        $email= $data["email"];
        $pos = strpos($email, "@");
        $rest = substr($email, 0, $pos);
        // variables locales que iran al compact
        $Nme = $rest;
        $Nombres = $data["nombre_us"] ." ". $data["apellido_us"];
       /* $Cargo = $data["cargo_us"];
        $Departamento = $data["Departamento_us"];*/
        $Password = $data["id_us"];
        //llamando a las funciones de creacion en personas y usuarios sistemas
        $this->storepe_persona($data);
        $this->storead_usuarios_sistemas($data);
        //redireccionando directamente junto con datos relevantes para mostrar
        return view('layouts.admin.usuarios.liRegistroUsuarios', compact('Nme','Nombres','Password'));
       // return redirect('/admin/usuarios/lregistro');

    }

public function storepe_persona($data)
    {
            $fecha = new \DateTime();
            $persona = new pe_personas;
            $persona->id_persona = $data["id_us"];
            $persona->nombres = $data["nombre_us"];
            $persona->apellido = $data["apellido_us"];
            $persona->nombres_completos = $data["nombre_us"] ." ". $data["apellido_us"];
            $persona->id_tipo_identificacion = "CI";
            $persona->identificacion = $data["id_us"];
            $persona->telefono=$data["apellido_us"];
            $persona->sexo=$data["generol"];
            //$persona->email = $data["email"];
            $persona->f_creacion = $fecha->format('m/d/Y'); //H:i:s  <-- hora
            //$persona->ad_usuarios_sistemas_id_usuario = "null";  //eliminado temporalmente en la BD
            $persona->save();
            //return redirect('/admin/usuarios/registroa');// -> json (la vriable que retorna );// ruta especifica
            //return back(); //redirecciona atras    
    //echo 'creado artículo con id: ' . $persona->id_persona;  // para un futuro
        
    }
    public function storead_usuarios_sistemas($data)
    {

        $fecha = date("Y-m-d"); ;//new \DateTime();
        $pos = strpos($data["emaill"], "@");
        $rest = substr($data["emaill"], 0, $pos);
        $ad_us_sist = new ad_usuarios_sistemas;
        $ad_us_sist->id_usuario = $data["IDL"];
        $ad_us_sist->descripcion = $data["nombresl"] ." ". $data["apellidosl"]  ;
        $ad_us_sist->estado = "A";
        $ad_us_sist->fecha_creacion = $fecha;//->format('d/m/Y');
        $ad_us_sist->fecha_ultima_conexion = $fecha;
        $ad_us_sist->clave = encrypt($data["IDL"]); //encrypt($data[staticId);
        $ad_us_sist->id_persona = $data["IDL"];
        $ad_us_sist->correo=$data["emaill"];
        $ad_us_sist->save();
    }

    public function edit_usuario(Request $request)
    {
        
        $user = pe_personas::find(request()->clave_us);
        if (is_null ($user))
            {
                App::abort(404);
            }

        return print_r($user);//view('/admin/usuarios/configuracion',compact('user'));
    }
public function select_listado_de_roles(){
    //$ad_rolesrro = ad_roles:   
    //:with('bebidas','carro_compra')->get(); 
        //algo general...

        //enviamos los datos a la vista
    //$options = ad_roles->get('descripcion','id_rol');
    return view('layouts.admin.usuarios.asignacionusuarios',compact('$bebidas_carro'));
        }
























}
