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

    $cont_lat=0;
    $cont_long=0;
    $cont=0;
    /*LOCAL */
    //$conn_string = "host='localhost' port='5432' dbname='postgres' user='postgres' password='root'";
    /*GYE */
    $conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
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

        $cont_lat=0;
        $cont_long=0;
        $cont=0;
        //$conn_string = "host='localhost' port='5432' dbname='postgres' user='postgres' password='root'";
        $conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
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
    
    public function ajax_r_analisis(Request $request, $usuario)
    {        
        //exec("Rscript C:/Users/jcheverria/Desktop/Jorge Cheverria/fci/prueba/public/R/analisis_kmeans.R");
        //$test = exec('Rscript "C:/Users/jcheverria/Desktop/Jorge Cheverria/fci/prueba/public/R/analisis_kmeans1.R"');
        $test = exec("Rscript '/home/kbaque/Archivos Kev/UG/Tesis/fci/public/R/analisis_kmeans1.R' $usuario" );
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

        $conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
        $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());


        $id=1;
        $insert_data="INSERT INTO trayectoria_gye(
            latitud, longitud, velocidad, fecha, id_sector, id_tipo_vehiculo)
        VALUES ('$lat', '$long', '$velocidad', '$f_desde_mod', '$sector', '$tipo_vehiculo')";

        $result_all  = pg_query($insert_data);
                $array1=json_encode($result_all);

                return response()->json($array1);
    }
    public function ajax_python_analisis1()
    {

        $test1 = shell_exec("python C:/Users/saludsa/Videos/prueba/resources/views/layouts/admin/analisis/DBSCAM1.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis2()
    {

        $test1 = shell_exec("python C:/Users/saludsa/Videos/prueba/resources/views/layouts/admin/analisis/kmean.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis3()
    {

        $test1 = shell_exec("python C:/Users/saludsa/Videos/prueba/resources/views/layouts/admin/analisis/HCE.py");
        $array11=json_encode($test1);
        return response($array11);
   }
   public function ajax_python_analisis4()
    {

        $test1 = shell_exec("python C:/Users/saludsa/Videos/prueba/resources/views/layouts/admin/analisis/HCNE.py");
        $array11=json_encode($test1);
        return response($array11);
   }     
   public function ajax_carga_data_insert(Request $request,$coordenada,$fecha_registro,$fecha_desde,$fecha_hasta,$marcador_desde_lat,$marcador_desde_lng,$marcador_hasta_lat,$marcador_hasta_lng,$usuario)
   {
       
       $f_desde = $fecha_desde;
       $f_hasta = $fecha_hasta;

       $f_desde_mod=str_replace("+","",$f_desde);
       $f_hasta_mod=str_replace("+","",$f_hasta);
       $fecha_desde=$f_desde_mod;
       $fecha_hasta=$f_hasta_mod;

       $fecha_registro = date('Y-m-d H:i');
       $fecha_registro=str_replace("+","",$fecha_registro);
       $fecha_registro=str_replace("T"," ",$fecha_registro);

       $fecha_desde    = $fecha_desde;
       $fecha_desde    =str_replace("T"," ",$fecha_desde);

       
       $fecha_hasta    = $fecha_hasta;
       $fecha_hasta    =str_replace("T"," ",$fecha_hasta);        
       $i=0;

       $conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
       $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());

       $query_delete   ="DELETE FROM trayectoria_gye_hist";
       $result_delete  = pg_query($query_delete);

       $data = json_decode($coordenada);
       $cont_data=count($data);

       while($i<$cont_data)
       {
           $query_all   ="INSERT INTO trayectoria_gye_hist(latitud, longitud, usuario,fecha_registro, fecha_desde, fecha_hasta, marcador_lat_desde, marcador_lng_desde, marcador_lat_hasta, marcador_lng_hasta, id_tipo_vehiculo) VALUES (". $data[$i][1] .",". $data[$i][2] .",' $usuario ',' $fecha_registro ','$fecha_desde ',' $fecha_hasta ',' $marcador_desde_lat ',' $marcador_desde_lng ',' $marcador_hasta_lat ',' $marcador_hasta_lng ',". $data[$i][0] .")";
           $result_all  = pg_query($query_all);
           $i=$i+1;
       }        
       $array1=json_encode(count($data));
       return response()->json($array1);
   }   
  public function ajax_carga_data_insert2(Request $request,$coordenada,$fecha_registro,$fecha_desde,$fecha_hasta,$marcador_desde_lat,$marcador_desde_lng,$marcador_hasta_lat,$marcador_hasta_lng,$usuario)
    {
        
        $f_desde = $fecha_desde;
        $f_hasta = $fecha_hasta;

        $f_desde_mod=str_replace("+","",$f_desde);
        $f_hasta_mod=str_replace("+","",$f_hasta);
        $fecha_desde=$f_desde_mod;
        $fecha_hasta=$f_hasta_mod;

        $fecha_registro = date('Y-m-d H:i');
        $fecha_registro=str_replace("+","",$fecha_registro);
        $fecha_registro=str_replace("T"," ",$fecha_registro);

        $fecha_desde    = $fecha_desde;
        $fecha_desde    =str_replace("T"," ",$fecha_desde);

        
        $fecha_hasta    = $fecha_hasta;
        $fecha_hasta    =str_replace("T"," ",$fecha_hasta);        
        $i=0;

        $conn_string = "host='52.38.27.79' port='5432' dbname='datos_gye' user='postgres' password='admin1234'";
        $dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());

        $query_delete   ="DELETE FROM trayectoria_gye_hist";
        $result_delete  = pg_query($query_delete);

        $data = json_decode($coordenada);
        $cont_data=count($data);

        while($i<$cont_data)
        {
            $query_all   ="INSERT INTO trayectoria_gye_hist(latitud, longitud, usuario,fecha_registro, fecha_desde, fecha_hasta, marcador_lat_desde, marcador_lng_desde, marcador_lat_hasta, marcador_lng_hasta, id_tipo_vehiculo) VALUES (". $data[$i][1] .",". $data[$i][2] .",' $usuario ',' $fecha_registro ','$fecha_desde ',' $fecha_hasta ',' $marcador_desde_lat ',' $marcador_desde_lng ',' $marcador_hasta_lat ',' $marcador_hasta_lng ',". $data[$i][0] .")";
            $result_all  = pg_query($query_all);
            $i=$i+1;
        }        
        $array1=json_encode(count($data));
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
        return view('layouts.admin.usuarios.liRegistroUsuarios', compact('Nme','Nombres','Cargo','Departamento','Password'));
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
        $ad_us_sist = new AD_USUARIOS_SISTEMAS;
        $ad_us_sist->id_usuario = $data["IDL"];
        $ad_us_sist->descripcion = $data["nombresl"] ." ". $data["apellidosl"]  ;
        $ad_us_sist->estado = "A";
        $ad_us_sist->fecha_creacion = $fecha;//->format('d/m/Y');
        $ad_us_sist->fecha_ultima_conexion = $fecha;
        $ad_us_sist->clave = encrypt($data["IDL"]); //encrypt($data[staticId);
        $ad_us_sist->id_persona = $data["IDL"];
        $ad_us_sist->email=$data["emaill"];
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
