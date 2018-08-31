@extends('layouts.admin.base')

@section('title', 'Configuracion Roles')

@section('content')
  
<div class="row">
  <div class="col-md-3">
    <div class="x_panel">
         <form method="POST" class="form-horizontal form-label-left" >
      
      <table>
        <tr>
          <td><label>Fecha desde: </label></td>
          <td><input type="datetime-local" name="fecha_desde" id="fecha_desde"></td>        
        </tr>
        <tr>
          <td><label>Fecha hasta: </label></td>
          <td><input type="datetime-local" name="fecha_hasta" id="fecha_hasta"></td>
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
            </select>
          </td>
        </tr>          
        <tr>        
          <td align="r" colspan="2">
            <input class="btn btn-sm btn-primary" type="button" value="Aceptar"    name="bt_aceptar"  align="center" onclick="carga_puntos_map();"/>            
            <input class="btn btn-sm btn-success" type="button" value="Analisis"   name="bt_analisis" align="center" onclick="ajax_r();"/>
            <input class="btn btn-sm btn-danger" type="button" value="Actualizar" name="bt_limpiar"  align="center" onclick="window.location.reload()"/>
            
          </td>        
        </tr>      
      </table>
    </form>

    <img src="" id="imagen" class="img-responsive" style="height: 450px;">
    <?php
      if (isset($_POST['bt_aceptar']))
      {
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];
      }
    ?>
    </div> 
  </div>
  <div class="col-md-9">
    <div class="x_panel">

      <div id="mapid" style="width: 100%;height:617px;"></div>

      <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
  <script src="{{ asset('js/analisis/jquery-3.3.1.min.js') }}"></script>
  <!-- OSM -->
  <!-- Cluster -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/leaflet.markercluster-src.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/leaflet.markercluster.js"></script>  

 
  <script>
      var bandera_analisis;
      var latlngs      = new Array();
      var latlngs_data = new Array();
      var arr_lat_lng  = new Array();
      var latlngA; var lat; var cont=0;  
      var latlngB; var lng; var cont_funcion=0;
      var fecha_desde;
      var fecha_hasta;
      var usuario="kbaque";
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
        if(cont<=1)
        {
          var lvl_zoom=mymap.getZoom();
          if(lvl_zoom>16)
          {
            window.alert("Por favor aléjese más.");
          }
          else if(lvl_zoom<16)
          {
            alert("Por favor acérquese más.");
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
              //console.log(arr_lat_lng);
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
        bandera_analisis=true;
        console.log(cont_funcion);
        fecha_desde  = $('#fecha_desde').val();
        fecha_hasta  = $('#fecha_hasta').val();
        latlngA      = arr_lat_lng[0];
        latlngB      = arr_lat_lng[1];

        if(fecha_desde!="" && (latlngA!=null && latlngB!=null) && cont_funcion==0)
        {        
          cont_funcion = cont_funcion+1;
          carga_puntos(latlngA,latlngB,fecha_desde,fecha_hasta);
        }
        else if(fecha_desde=="" || fecha_hasta=="")
        {
          alert("Ingrese los valores de las fechas.");        
        }
        else if(latlngA==null || latlngB==null)
        {
          alert("Ingrese los Marcadores.");
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
    function carga_puntos(latlngA,latlngB,fecha_desde,fecha_hasta)
      {
        $.ajax(
          {
            type:"GET",
            url: "ajax_carga_data/" + fecha_desde + "/" + fecha_hasta,

            success: function(result)
            {
            var JsonResult   = result;                   
            var count_result=result.latlngs.length
            console.log(result.latlngs.length);
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
                  //L.marker(point, {icon: Icon_data}).addTo(mymap);
                }
              }
              //insertar_datos(latlngs_data,"LOCALTIMESTAMP",fecha_desde,fecha_desde,latlngA.lat,latlngA.lat,latlngA.lat,latlngA.lat,usuario);
              insertar_datos(latlngs_data);
              capa_point(latlngs_data);
            },
           error:function(result){
            alert("Error en la carga masiva de datos.");
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
          Icon_limite       = new Icon_all({iconUrl: "{{ asset('img/images/limite.png') }}"});
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
        var cont_vehiculos=0;
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
                    
        alert("Total de vehiculos: "+cont_vehiculos);
      }
      /*
      *Funcion que se encarga en ingresar los datos necesarios para el analisis kmeans.
      */      
      function insertar_datos(coordenada)
      {        
        jObject= JSON.stringify(coordenada);
        console.log(jObject);
        $.ajax(
          {
            type: "POST",            
            url: "ajax_carga_data_insert",
            data: {jObject:jObject},
            success: function(result)
            {              
              console.log(result);
            }
          });
      }
      function insertar(id,descripcion,latitud)
      {
        $.ajax(
          {
            type:"GET",
            url: "insert_data.php?id=" + id,
            success: function(result)
            {              
              console.log(result);
            }
          });
      }
      function ajax_r()
      {        
        if (bandera_analisis==true)
        {
          num_cluster = $('#num_cluster').val();
          $.ajax(
            {
              type:"GET",
              url: "ajax_r_analisis/"+usuario+"/"+num_cluster,              
              success: function(result)
              {
              console.log(result); 
                var imagen = document.getElementById('imagen').src = "{{ asset('img/images/analisis2.jpeg') }}";
              }
            });
        }
        else
        {
          alert("Por favor primero indique la zona donde desea realizar el analisis.");
        }        
      }

  </script>
    </div>
  </div>
</div>  

</div>

@endsection
