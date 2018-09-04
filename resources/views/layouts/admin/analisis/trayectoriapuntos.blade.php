@extends('layouts.admin.base')

@section('title', 'Configuracion Roles')

@section('content')

<div class="row">
  <div class="col-md-3">
    <div class="x_panel">
         <form method="POST" class="form-horizontal form-label-left" >      
      <table>
        <tr>

          <td><label>Fecha: </label></td>
          <td><input type="datetime-local" name="fecha_desde" id="fecha_desde"></td>        
        </tr>
        <tr>
          <td colspan="2">  
            <label>Base de datos: </label>
            <select name="bd" id="bd">
            <option value="1">Base de datos simulada </option>
            <option value="2">Base de datos real </option>                    
            </select>
          </td>            
        </tr>
        <tr>
        <td colspan="2">
            <label>Num. de Clusters: </label>
            <select name="num_cluster" id="num_cluster">
            <option value="1">1 Cluster</option>
            <option value="2">2 Cluster</option>
            <option value="3">3 Cluster</option>
            <option value="4">4 Cluster</option>
            <option value="5">5 Cluster</option>
            <option value="6">6 Cluster</option>
            <option value="7">7 Cluster</option>
            <option value="8">8 Cluster</option>
            <option value="9">9 Cluster</option>
            <option value="10">10 Cluster</option>            
            </select>
          </td>
        </tr>
        <tr>        
          <td align="r" colspan="2">
            <input class="btn btn-sm btn-primary" type="button" value="Aceptar"    name="bt_aceptar"  id="bt_aceptar"  align="center" onclick="carga_puntos_map();"/>
            <input class="btn btn-sm btn-success" type="button" value="Analisis"   name="bt_analisis" id="bt_analisis" align="center" onclick="ajax_r();"/>  
            <input class="btn btn-sm btn-danger" type="button" value="Actualizar"  name="bt_limpiar"  align="center" onclick="window.location.reload()"/>            
          </td>        
        </tr>
        <tr>        
          <td align="r" colspan="2">
            <input class="btn btn-sm btn-warning" type="button" value="KMEANS"    name="bt_kmean"  id="bt_kmean"  align="center" onclick="nn();"/>
            <input class="btn btn-sm btn-warning" type="button" value="DBSCAN"    name="bt_dbscan"  id="bt_dbscan"  align="center" onclick="nn();"/>
            <input class="btn btn-sm btn-warning" type="button" value="HCN"    name="bt_hcn"  id="bt_hcn"  align="center" onclick="nn();"/>
            <input class="btn btn-sm btn-warning" type="button" value="HCNE"    name="bt_hcne"  id="bt_hcne"  align="center" onclick="nn();"/>         
          </td>        
        </tr>     
      </table>
    </form>

    <img src="{{ asset('img/images/cargando_ajax.gif') }}" id="imagen" class="img-responsive" style="height: 450px;visibility: hidden;">
    <?php
      if (isset($_POST['bt_aceptar']))
      {
        $fecha_desde = $_POST['fecha_desde'];
      }
    ?>
    </div> 
  </div>
  <div class="col-md-9">
    <div class="x_panel">
      <div id="mapid" style="width: 100%;height:593px;"></div>

      <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
    
  <script src="{{ asset('js/analisis/jquery-3.3.1.min.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- OSM -->
  <!-- Cluster -->
 
  <script>      
  
    function nn()
    {
      $.ajax(
        {
          type:"GET",
          url: "ajax_python/1/1/1",              
          success: function(result)
          {                
            console.log(result); 
            var count_result=result.length;
              for(i=0;i<count_result;i++)
              {
                if (i%2!= 0)
                {
                  var newcoor2   = new Array();
                  newcoor2[0]    = result[i-1];
                  newcoor2[1]    = result[i];
                  L.marker(newcoor2, {icon: Icon_limite2}).addTo(mymap).bindPopup("Analisis Kmeans");
                }               
              }                
            },
          error:function(result)
          {
            swal("", "Error al generar el análisis.!", "success",{icon: "warning",});            
          }
        });
    }
      var cont_vehiculos=0;
      var bandera_analisis;      
      var latlngs      = new Array();
      var latlngs_data = new Array();
      var arr_lat_lng  = new Array();
      var latlngA; var lat; var cont=0;  
      var latlngB; var lng; var cont_funcion=0;
      var fecha_desde;
      var usuario="{{ Auth::user()->id }}";
      var mymap = L.map('mapid', {
                    fadeAnimation: false,
                    zoomAnimation: false,
                    markerZoomAnimation: false
                  }).setView([-2.1887106287772053,-79.89135503768922],16);
      var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
      var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
      //var osm = new L.TileLayer(osmUrl,{minZoom: 7,maxZoom: 14,attribution: osmAttrib});
      var osm = new L.TileLayer(osmUrl, {
        minZoom: 12, maxZoom: 18,
          attribution: osmAttrib,
          updateWhenIdle: true,
          reuseTiles: true
      });
      osm.addTo(mymap);

      /*
      *Funcion que genera marcadores sobre el mapa, validando el zoom del mismo.    
      */    
      function onMapClick(e)
      {
        var lvl_zoom=mymap.getZoom();
        if(cont<=1)
        {
          if(lvl_zoom>16)
          {
            swal("", "Por favor aléjese más!", "success",{icon: "warning",});
          }
          else if(lvl_zoom<16)
          {
            swal("", "Por favor acérquese más!", "success",{icon: "warning",});
          }
          else if(lvl_zoom==16)
          {
            //latitud = X || longitud = Y
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            var newcoor       = new Array();
                newcoor[0]    = lat;
                newcoor[1]    = lng;
            latlngs.push(newcoor);
            arr_lat_lng[cont] = e.latlng;            
            if(cont==0||cont==1)
            {
              L.marker(newcoor, {icon: Icon_limite}).addTo(mymap).bindPopup("Lat: "+lat+" lng: "+lng);
            }
            if(cont==1)
            {
              var polyline     = L.polyline(latlngs, {color: ''}).addTo(mymap);
              var centro_linea = polyline.getCenter();                    
              var distancia_m  = parseInt(distancia(mymap,arr_lat_lng[0],arr_lat_lng[1]));          
              var circulo      = L.circle(centro_linea, {radius: distancia_m*1.5}).addTo(mymap);
              //L.marker(centro_linea, {icon: Icon_limite}).addTo(mymap);
              console.log("centro: "+polyline.getCenter());
              console.log("distancia funcion: ",distancia_m);              
            }
            cont=cont+1;
          }
        }
      }
      mymap.on('click', onMapClick);      

      /*
      *Funcion que se encarga de enviar los parametros necesarios para la carga masiva de puntos, mediante el uso de ajax.
      */
      function carga_puntos_map()
      {                
        fecha_desde  = $('#fecha_desde').val();
        latlngA      = arr_lat_lng[0];
        latlngB      = arr_lat_lng[1];

        if(fecha_desde!="" && (latlngA!=null && latlngB!=null) && cont_funcion==0)
        {        
          bandera_analisis=true;
          swal("Datos correctos!", "", "success");
          cont_funcion = cont_funcion+1;
          carga_puntos(latlngA,latlngB,fecha_desde);
        }
        else if(fecha_desde=="")
        {
          swal("", "Ingrese el valor de la fecha!", "success",{icon: "warning",});          
        }
        else if(latlngA==null || latlngB==null)
        {
          swal("", "Limite la zona, por favor!", "success",{icon: "warning",}); 
        }      
      }
      /*
      *Devuelve la distancia entre dos coordenadas geográficas.
      *según el CRS del mapa. Por defecto, mide la distancia en metros.
      *Para el calculo se usa la Ley Esférica de Coseno .
      */
      function distancia(map, latlngA, latlngB) 
      {
          return map.latLngToLayerPoint(latlngA).distanceTo(map.latLngToLayerPoint(latlngB));
      }
      /*
      *Funcion que se encarga en realizar la carga masiva.
      */
    function carga_puntos(latlngA,latlngB,fecha_desde)
      {        
        $.ajax(
          {
            type:"GET",
            url: "ajax_carga_data2/" + fecha_desde,
            beforeSend: function () {
                console.log("cargando...");                
                document.getElementById('imagen').style.visibility = 'visible';
              },
            success: function(result)
            {
              document.getElementById('imagen').style.visibility = 'hidden';
              var JsonResult   = result;
              var count_result=result.latlngs.length;
                for(i=0;i<count_result;i++)
                {
                  var id_user    = JsonResult.latlngs[i][0];//ID user
                  var lat_d      = JsonResult.latlngs[i][1];//latitud
                  var lng_d      = JsonResult.latlngs[i][2];//longitud
                  //Valida si los puntos extraidos en la base de datos existen en la limitacion de la zona.
                  var point      = new L.LatLng(lat_d,lng_d);
                  var tolerance  = tolerance === undefined ? 0.2 : tolerance;
                  var hypotenuse = latlngA.distanceTo(latlngB),
                  delta          = latlngA.distanceTo(point) + point.distanceTo(latlngB) - hypotenuse;
                  var result     = delta/hypotenuse < tolerance
                  if(result)
                  {
                    var point_data    = new Array();
                        point_data[0] = id_user;
                        point_data[1] = lat_d;
                        point_data[2] = lng_d;
                    latlngs_data.push(point_data);                                    
                  }
                }                              
                if(latlngs_data.length>0)
                {              
                  capa_point(latlngs_data);
                  insertar_datos(latlngs_data,usuario);
                }
                else
                {
                  swal("No existen datos", "Actualice y límite otro lugar por favor.!", "success",{icon: "warning",});
                  document.getElementById('imagen').style.visibility = 'hidden';
                }
            },
           error:function(result){
            swal("", "Error en la carga masiva de datos.!", "success",{icon: "warning",});
            document.getElementById('imagen').style.visibility = 'hidden';
           }
          });
      }
      /*
      ************************************************
      ********CARACTERISTICA DE LOS MARCADORES********
      ************************************************
      */
      var Icon_data = L.Icon.extend({
        options:{
                  iconSize:     [10, 10], // size of the icon [38, 95]
                }
      });
      var Icon_all  = L.Icon.extend({
        options:{
                  //shadowUrl: 'images/marker_shadow.png',
                  iconSize:     [28, 35], // size of the icon [38, 95]
                  //shadowSize:   [50, 64], // size of the shadow [50, 64]
                  iconAnchor:   [12, 34], // point of the icon which will correspond to marker's location [22, 94]
                  //shadowAnchor: [4, 62],  // the same for the shadow [4, 62]
                  //popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor [-3, -76]
                }
      });
      var Icon_moto         = new Icon_data({iconUrl: "{{ asset('img/images/p1.png') }}"}),
          Icon_colectivo    = new Icon_data({iconUrl: "{{ asset('img/images/p2.png') }}"}),
          Icon_auto         = new Icon_data({iconUrl: "{{ asset('img/images/p3.png') }}"}),
          Icon_motoneta     = new Icon_data({iconUrl: "{{ asset('img/images/p4.png') }}"}),
          Icon_bicicleta    = new Icon_data({iconUrl: "{{ asset('img/images/p5.png') }}"}),
          Icon_taxi_informal= new Icon_data({iconUrl: "{{ asset('img/images/p6.png') }}"}),
          Icon_camioneta    = new Icon_data({iconUrl: "{{ asset('img/images/p7.png') }}"}),
          Icon_furgoneta    = new Icon_data({iconUrl: "{{ asset('img/images/p8.png') }}"}),
          Icon_comercial    = new Icon_data({iconUrl: "{{ asset('img/images/p9.png') }}"}),
          Icon_taxi         = new Icon_data({iconUrl: "{{ asset('img/images/p10.png') }}"}),
          Icon_escolar      = new Icon_data({iconUrl: "{{ asset('img/images/p11.png') }}"}),
          Icon_metro        = new Icon_data({iconUrl: "{{ asset('img/images/p12.png') }}"}),
          Icon_trailer      = new Icon_data({iconUrl: "{{ asset('img/images/p13.png') }}"}),
          Icon_camion       = new Icon_data({iconUrl: "{{ asset('img/images/p14.png') }}"}),
          Icon_empresarial  = new Icon_data({iconUrl: "{{ asset('img/images/p15.png') }}"}),
          Icon_limite       = new Icon_all({iconUrl: "{{ asset('img/images/limite.png') }}"}),
          Icon_limite2       = new Icon_all({iconUrl: "{{ asset('img/images/marker_data.png') }}"});
      L.icon                = function (options) {return new L.Icon(options);};    
      /*
      *Funcion que se encarga en la clasificacion de los vehiculos
      */
      function capa_point(cordenada)
      {
        var arr_puntos0     = new Array();
        var arr_puntos1     = new Array();
        var arr_puntos2     = new Array();
        var arr_puntos3     = new Array();
        var arr_puntos4     = new Array();
        var arr_puntos5     = new Array();
        var arr_puntos6     = new Array();
        var arr_puntos7     = new Array();
        var layerControl    = false;
        var count_cordenada = cordenada.length;        
        for(i=0;i<count_cordenada;i++)
        {
          if(cordenada[i][0]==1)
          {
            arr_puntos0.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_moto}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==2)
          {
            arr_puntos1.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_colectivo}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==3)
          {
            arr_puntos2.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_auto}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==4)
          {
            arr_puntos3.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_motoneta}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==5)
          {
            arr_puntos4.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_bicicleta}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==6)
          {
            arr_puntos5.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_taxi_informal}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==7)
          {
            arr_puntos6.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_camioneta}));
            cont_vehiculos++;
          }
          if(cordenada[i][0]==8)
          {
            arr_puntos7.push(L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_furgoneta}));    
            cont_vehiculos++;        
          }
        }
        if(layerControl === false) {
          layerControl = L.control.layers().addTo(mymap);
        }        
        var puntos_mapa   = L.layerGroup(null).addTo(mymap);
        if(arr_puntos0.length>0){var puntos_mapa0  = L.layerGroup(arr_puntos0).addTo(mymap);}
        else{var puntos_mapa0  = L.layerGroup(arr_puntos0);}
        if(arr_puntos1.length>0){var puntos_mapa1  = L.layerGroup(arr_puntos1).addTo(mymap);}
        else{var puntos_mapa1  = L.layerGroup(arr_puntos1);}
        if(arr_puntos2.length>0){var puntos_mapa2  = L.layerGroup(arr_puntos2).addTo(mymap);}
        else{var puntos_mapa2  = L.layerGroup(arr_puntos2);}
        if(arr_puntos3.length>0){var puntos_mapa3  = L.layerGroup(arr_puntos3).addTo(mymap);}
        else{var puntos_mapa3  = L.layerGroup(arr_puntos3);}
        if(arr_puntos4.length>0){var puntos_mapa4  = L.layerGroup(arr_puntos4).addTo(mymap);}
        else{var puntos_mapa4  = L.layerGroup(arr_puntos4);}
        if(arr_puntos5.length>0){var puntos_mapa5  = L.layerGroup(arr_puntos5).addTo(mymap);}
        else{var puntos_mapa5  = L.layerGroup(arr_puntos5);}
        if(arr_puntos6.length>0){var puntos_mapa6  = L.layerGroup(arr_puntos6).addTo(mymap);}
        else{var puntos_mapa6  = L.layerGroup(arr_puntos6);}
        if(arr_puntos7.length>0){var puntos_mapa7  = L.layerGroup(arr_puntos7).addTo(mymap);}
        else{var puntos_mapa7  = L.layerGroup(arr_puntos7);}

        layerControl.addBaseLayer(puntos_mapa,"Tipos de Vehiculos")
                    .addOverlay(puntos_mapa0,"Auto particular->"+arr_puntos0.length)
                    .addOverlay(puntos_mapa1,"Buses-------------->"+arr_puntos1.length)
                    .addOverlay(puntos_mapa2,"Taxi----------------->"+arr_puntos2.length)
                    .addOverlay(puntos_mapa3,"Metrovía---------->"+arr_puntos3.length)
                    .addOverlay(puntos_mapa4,"Moto--------------->"+arr_puntos4.length)
                    .addOverlay(puntos_mapa5,"Camión----------->"+arr_puntos5.length)
                    .addOverlay(puntos_mapa6,"Camioneta------->"+arr_puntos6.length)
                    .addOverlay(puntos_mapa7,"Expreso---------->"+arr_puntos7.length);        
      }
      /*
      *Funcion que se encarga en ingresar los datos necesarios para el analisis kmeans.
      */
      function ajax_r()
      {
        if (bandera_analisis==true)
        {                          

          num_cluster = $('#num_cluster').val();          
          $.ajax(
            {
              type:"GET",
              url: "ajax_r_analisis/"+usuario+"/"+num_cluster,
              cache: false,
              beforeSend: function () {
                console.log(document.getElementById('imagen').style.visibility);
                console.log("cargando...");                

                if(document.getElementById('imagen').style.visibility!='hidden')
                {            
                  var imagen=document.getElementById('imagen').src = "{{ asset('img/images/cargando_ajax.gif') }}";
                  console.log(imagen);
                  document.getElementById('imagen').style.visibility = 'visible';                  
                }else{
                  document.getElementById('imagen').style.visibility = 'visible';
                }                
              },
              success: function(result)
              {                                
                console.log(result); 
                if(result)
                {
                  document.getElementById('imagen').style.visibility = 'visible';
                  swal("", "Se cargaron los datos exitosamente!", "success");
                  var imagen=document.getElementById('imagen').src = "{{ asset('img/images/analisis2.png') }}";
                }
                else
                {
                  swal("", "Error al generar el análisis.!", "success",{icon: "warning",});
                  document.getElementById('imagen').style.visibility = 'hidden';    
                }                
              },
           error:function(result){
            swal("", "Error al generar el análisis.!", "success",{icon: "warning",});
            document.getElementById('imagen').style.visibility = 'hidden';
           }
            });            
        }
        else
        {          
          swal("", "Por favor primero, indique la zona donde desea realizar el analisis!", "success",{icon: "warning",});
        }        
      }
  </script>
    </div>
  </div>
</div>  
  <table>
      <tr>
        <th>
                    <input class="btn btn-sm btn-warning" type="button" value="DBSCAM"   name="bt_analisis" align="center" onclick="ajax_python1();"/>
              <img src="" id="imagen1" class="img-responsive" style="height: 450px;">
        </th>
        <th>
                    <input class="btn btn-sm btn-warning" type="button" value="kmeans"   name="bt_analisis" align="center" onclick="ajax_python2();"/>
            <img src="" id="imagen2" class="img-responsive" style="height: 450px;">
        </th>
      </tr>
      <tr>
        <th>
                  <input class="btn btn-sm btn-warning" type="button" value="HCE"   name="bt_analisis" align="center" onclick="ajax_python3();"/>
              <img src="" id="imagen3" class="img-responsive" style="height: 450px;">
        </th>
        <th>
          <input class="btn btn-sm btn-warning" type="button" value="HCNE"   name="bt_analisis" align="center" onclick="ajax_python4();"/>
          <img src="" id="imagen4" class="img-responsive" style="height: 450px;">
        </th>
      </tr>
    </table>
    <script type="text/javascript">
  function ajax_python1()
      {
        $.ajax(
          {
            type:"GET",
            url: "ajax_python_analisis1",
            success: function(result)
            {             
            console.log(result); 
              var imagen1 = document.getElementById('imagen1').src = "{{ asset('img/images/dbScanCal.png') }}";
            }
          });
      }
  function ajax_python2()
      {
        $.ajax(
          {
            type:"GET",
            url: "ajax_python_analisis2",
            success: function(result)
            {             
            console.log(result); 
              var imagen2 = document.getElementById('imagen2').src = "{{ asset('img/images/KmeansCal.png') }}";
            }
          });
      }
 function ajax_python3()
      {
        $.ajax(
          {
            type:"GET",
            url: "ajax_python_analisis2",
            success: function(result)
            {             
            console.log(result); 
              var imagen3 = document.getElementById('imagen3').src = "{{ asset('img/images/HCES.png') }}";
            }
          });
      } 
 function ajax_python4()
      {
        $.ajax(
          {
            type:"GET",
            url: "ajax_python_analisis2",
            success: function(result)
            {             
            console.log(result); 
              var imagen4 = document.getElementById('imagen4').src = "{{ asset('img/images/HCNE.png') }}";
            }
          });
      }
      function insertar_datos(coordenada,usuario)
      {                
        jObject= JSON.stringify(coordenada);
        obj_us= JSON.stringify(usuario);
        console.log(jObject);
        $.ajax(
          {
            type: "POST",            
            url: "ajax_carga_data_insert2",
            data: {'jObject':jObject,'obj_us':obj_us},
            beforeSend: function () {
              swal("Total de vehículos: "+cont_vehiculos, "Ingresando los vehículos a la base de datos!");              
              console.log("cargando...");                
              document.getElementById('imagen').style.visibility = 'visible';
            },            
            success: function(result)
            {
              document.getElementById('imagen').style.visibility = 'hidden';              
              var JsonResult   = result;   
              console.log(JsonResult);
            },
            complete: function(result) {
              swal("", "Se cargaron los datos exitosamente!", "success");
              nn();
            },
           error:function(result){
            swal("", "Error en el ingreso de carga masiva de datos.!", "success",{icon: "warning",});
            document.getElementById('imagen').style.visibility = 'hidden';
           }

          });
      }   
</script>
</div>

@endsection
