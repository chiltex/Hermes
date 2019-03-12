<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>HERMES |CRM</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Custom MAPS -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script> 
    <style>
      .div1 {
           overflow:scroll;
           height:200px;
           width:auto;
      }
     

    </style>
    <script> 
function localize() { 
if (navigator.geolocation) { 
navigator.geolocation.getCurrentPosition(mapa,error); 
} else { 
alert('Tu navegador no soporta geolocalizacion.'); 
} 
} 
function mapa(pos) { /************************ Aqui están las variables que te interesan***********************************/ 
var latitud = pos.coords.latitude; 
var longitud = pos.coords.longitude; 
var precision = pos.coords.accuracy; 
var contenedor = document.getElementById("map") 
document.getElementById("lti").innerHTML=latitud;
document.getElementById("lgi").innerHTML=longitud;  
document.getElementById("psc").innerHTML=precision; 
var centro = new google.maps.LatLng(latitud,longitud); 
var propiedades = { zoom: 15, center: centro, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
var map = new google.maps.Map(contenedor, propiedades); 
var marcador = new google.maps.Marker({ position: centro, map: map, title: "Tu posicion actual" }); 
document.cookie = 'latcookie='+latitud; 
document.cookie ='loncookie='+longitud;

} 
function error(errorCode) { 
if(errorCode.code == 1) 
alert("No has permitido buscar tu localizacion") 
else if (errorCode.code==2) 
alert("Posicion no disponible") 
else 
alert("Ha ocurrido un error") 
} 
</script>
</head>
<body class="nav-md" onLoad="localize()">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <img src="../logos/logohermes.jpeg" alt="..." width="225" height="70" >
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="../logos/user.png" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo''.$_SESSION['nombre_usuario']; ?></h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->
    
                <br />
    
                <!-- sidebar menu -->
                  <?php
                 require_once "menuAdmin.php";
                  ?>
                <!-- /sidebar menu -->
    
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                  <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="../controller/LoginControlador.php?accion=logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
                <!-- /menu footer buttons -->
              </div>
            </div>
    
            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav>
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
    
                  <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt=""><?php echo''.$_SESSION['nombre_usuario']; ?>
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        
                        
                        <li><a data-toggle="tooltip" data-placement="top" title="Logout" href="../controller/LoginControlador.php?accion=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                      </ul>
                    </li>
    
                   
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->
    
            <!-- page content -->
            <div class="right_col" role="main">
              
        
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                      <div class="x_title">
                        <h2>Agregar Ficha Tecnica</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              
                            </ul>
                          </li>
                         
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                        <br />
                        <div class="row">
                          <div class="col-xs-12 col-md-10 col-xs-12">
                          
           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/FichaTecnicaControlador.php?accion=guardar" method="post" ENCTYPE="multipart/form-data">
              <div class="row">
                              <div class="col-lg-6 col-sm-9 col-xs-12">
                                
                                <?php 
                              if (isset($_GET['bandera'])) {
                            $bandera = $_GET['bandera'];

                                echo' <input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/> 
                                <input type="button" name="view" value="Seleccionar Empresa"  id="1" bandera="'.$bandera.'" class="btn btn-info view_data"/> 

                                ';
                              }else {
                                $bandera="admin";
                                
                                echo' <input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/>  
                                <input type="button" name="view" value="Seleccionar Empresa"  id="1" bandera="'.$bandera.'" class="btn btn-info view_data"/>
                                
                                 <input type="button" name="view" value="Agregar Empresa/Contacto" bandera="'.$bandera.'" id="1" class="btn btn-info view_data3"/> 
                                  ';
                              }
                             ?>
                   
                                <?php 
                                      if (is_null($_GET["cliente"])&& is_null($_GET["nombre"])) {
                                       $id=0;
                                       $nombre="N/A";
                                      }else{
                                         $id=$_GET["cliente"];
                                         $nombre=$_GET["nombre"]; 
                                         if ($id!="0" && $nombre!="N/A") {
                                             echo '
                                         <div class="col-xs-8"><h4>Empresa:<strong> '.$nombre.'</strong></h4></div>';
                                           echo ' <input type="button" name="view" value="Agregar Contacto" id="'.$id.'" nombre="'.$nombre.'" bandera="'.$bandera.'" class="btn btn-warning view_data4"/>';
                                               echo ' <input type="button" name="view" value="Seleccionar producto" id="'.$id.'" nombre="'.$nombre.'" bandera="'.$bandera.'" class="btn btn-info view_data2"/>
                                                  <input type="button" name="view" value="Ingresar Nuevo Producto" id="'.$id.'" nombre="'.$nombre.'" class="btn btn-success save_PC"/>
                                            ';
                                           # code...
                                         }else{
                                           echo '
                                         <div class="col-xs-8"><h2>Empresa:<strong> '.$nombre.'</strong></h2></div>';
                                         }
                                      

                                      }
                                      ?>
                                        <?php 
                                           

                                            if (is_null($_GET["id_producto"]) && is_null($_GET["codigo_serie"])&& is_null($_GET["producto"])) {
                                               $id_producto=0;
                                               $codigo_serie=0000;
                                               $producto="N/A";
                                              }else{
                                                 $id_producto=$_GET["id_producto"];
                                                 $codigo_serie=$_GET["codigo_serie"];
                                                  $producto=$_GET["producto"];
                                              }
                                              echo '
                                                <div class="col-xs-8"><h3>Producto:<strong> '.$producto.'</strong>  Codigo serie: <strong> '.$codigo_serie.'</strong></h3></div> 
                                 
                                              <input type="hidden" name="id_producto" id="id_producto" value="'.$id_producto.'"/>
                                                  ';

                                             ?>
                                      <table id="example2 datatable-buttons" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th>Contacto</th>
                                          <th>Numero</th>                       
                                          <th>Seleccionar</th>                          
                                        </tr>
                                      </thead>
                                      <TBODY>
                                         <?php 
                                         require_once "../class/FichaTenica.php";
                                         $ms = new FichaTecnica();
                                         $contacto = $ms->selectOneC($id);
                                         $checking =0;
                                         foreach ((array)$contacto as $row) {
                                     if ($checking == 0) {

                                         echo '
                                          <tr>
                                           <td>'.$row['nombre'].'</td>
                                           <td>'.$row["telefono"].'</td>
                                            <td>
                                            <input type="radio" name="id_contacto" id="id_contacto" checked value="'.$row["id_contacto"].'" />
                                             <input type="hidden" name="id_cliente" id="id_cliente" value="'.$row["id_cliente"].'"/>
                                           </td>
                                          </tr>
                                         ';
                                          }else{
                                         echo '
                                          <tr>
                                           <td>'.$row['nombre'].'</td>
                                           <td>'.$row["telefono"].'</td>
                                            <td>
                                            <input type="radio" name="id_contacto" id="id_contacto" value="'.$row["id_contacto"].'" />
                                             <input type="hidden" name="id_cliente" id="id_cliente" value="'.$row["id_cliente"].'"/>
                                           </td>
                                          </tr>
                                         ';
                                       }
                                         $checking = $checking +1;

                                       }

                                         
                                         $id_usuario=$_SESSION['id_usuario'];
                                         echo '<input type="hidden" name="id_usuario" id="id_usuario" value="'.$id_usuario.'"/>';
                                     
                                     
                                                     ?>
                                          </TBODY>
                                        </table>
                                      <div class="col-xs-12 col-md-8 col-lg-12">
                                        <div class="form-group">
                                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tipo Maquina
                                          </label>
                                          <div class="col-md-12 col-sm-6 col-xs-12">
                                             <!--  <select id="id_tipo_ma" name="id_tipo_ma" class="form-control ">
                                                 <?php 
                                             /*    require_once "../class/TipoMaquina.php";
                                                 $misGP = new TipoMaquina();
                                                 $tc = $misGP->selectAll();
                                                
                                                   # code...
                                                 
                                                 foreach ((array)$tc as $row) {
                                                 echo '<option value="'.$row["id_tipo_ma"].'">'.$row["nombre"].'</option>';
                                               }*/
                                               ?>
                                               </select>-->

                                            <input type="text" id="tipo_maquina" name="tipo_maquina" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Linea de Produccion
                                          </label>
                                          <div class="col-md-12 col-sm-6 col-xs-12">
                                            <input type="text" id="linea_produccion" name="linea_produccion" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>

                                   
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Descripcion Falla
                                        </label>
                                        <div class="col-md-12 col-sm-5 col-xs-12">                                   
                                         <textarea name="falla" id="falla" class="form-control" rows="10" cols="50"> </textarea>  
                          
                                          </div>
                                       
                                    </div>
                                       <div class="form-group">
                                      <div class="table-wrapper-scroll-y div1" >
                                         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Repuestos
                                        </label><br><br>
                                        <table id="example5" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th> </th>
                                          <th>Repuesto</th>
                                          <th>Codigo Serie</th>                       
                                          <th>Cantidad</th>                          
                                        </tr>
                                      </thead>
                                      <TBODY>
                                         <?php 
                                         require_once "../class/Repuestos.php";
                                         $repuesto = new Repuestos();
                                         $repuestos = $repuesto->selectALL();
                                         foreach ((array)$repuestos as $a) {
                                         echo '
                                          <tr>
                                            <td>
                                            <input type="hidden" name="id_repuestos[]" value="'.$a["id_repuesto"].'" />
                                           </td>
                                           <td>'.$a['nombre'].'</td>
                                           <td>'.$a["codigo_serie"].'</td>
                                           <td> <input type="text" id="cantidad" name="cantidad[]" class="form-control col-xs-3 col-xs-8"></td>
                                          </tr>
                                         ';

                                       }  ?>
                                          </TBODY>
                                        </table>

                                        </div>
                                      </div>
                                           <div class="form-group">
                                      <div class="table-wrapper-scroll-y div1" >

                                              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Consumibles
                                        </label>
                                        <br><br><br>
                                        <table id="example4" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th> </th>
                                          <th>Consumibles</th>
                                          <th>Codigo Serie</th>                       
                                          <th>Cantidad</th>                          
                                        </tr>
                                      </thead>
                                      <TBODY>
                                         <?php 
                                         require_once "../class/Consumibles.php";
                                         $Consumible = new Consumibles();
                                         $Consumibles = $Consumible->selectALL();
                                         foreach ((array)$Consumibles as $a) {
                                         echo '
                                          <tr>
                                            <td>
                                            <input type="hidden" name="id_consumibles[]" value="'.$a["id_consumible"].'" />
                                            '.$a["id_consumible"].'
                                           </td>
                                           <td>'.$a['nombre'].'</td>
                                           <td>'.$a["codigo_serie"].'</td>
                                           <td> <input type="text" id="cantidad" name="cantidadC[]" class="form-control col-xs-3 col-xs-8"></td>
                                          </tr>
                                         ';

                                       }  ?>
                                          </TBODY>
                                        </table>

                                        </div>
                                      </div> 
                                  
                                  </div>
                             </div>  
                              <div class="col-lg-6 col-md-8 col-lg-12">
                              	<div class="col-xs-12 col-sm-10 col-xs-12">
                              	  <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de Trabajo
                                          </label>
                                          <div class="col-md-12 col-sm-6 col-xs-10">
                                            <select id="tipo_trabajo" name="tipo_trabajo" class="form-control ">
                                              <option value="Contrato">Contrato</option>
                                              <option value="Cobro">Cobro</option>
                                              <option value="Garantia">Garantia</option> 
                                              <option value="Demostracion">Demostracion</option> 
                                              <option value="Cortesia">Cortesia</option>                                    
                                            </select>
                                          </div>
                                        </div>
                                        
                                  <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Datos Generales <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-6 col-xs-12">                                   
                               <!--          <textarea name="datos_generales" id="datos_generales" class="form-control" rows="6" cols="50">
Horas Maquina:
Horas bomba:
Make up: 
tinta:
cleaning:
software:</textarea>  
                          -->
                                          </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Horas manquina:
                                      </label>
                                      <div class="col-md-12 col-sm-6 col-xs-10">
                                        <input type="text" id="horas_maquina" name="horas_maquina"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Horas bomba:
                                      </label>
                                      <div class="col-md-10 col-sm-6 col-xs-10">
                                        <input type="text" id="horas_bomba" name="horas_bomba"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Make up:
                                      </label>
                                      <div class="col-md-12 col-sm-6 col-xs-10">
                                        <input type="text" id="make_up" name="make_up"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tinta:
                                      </label>
                                      <div class="col-md-12 col-sm-6 col-xs-10">
                                        <input type="text" id="tinta" name="tinta"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Cleaning:
                                      </label>
                                      <div class="col-md-12 col-sm-6 col-xs-10">
                                        <input type="text" id="cleaning" name="cleaning"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Software:
                                      </label>
                                      <div class="col-md-12 col-sm-6 col-xs-10">
                                        <input type="text" id="software" name="software"  class="form-control col-md-5 col-xs-12">
                                      </div>
                                    </div>
                                    
                                 	
                                       <div class="form-group">
                                     
                                   <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">  <p>Latitud:</p></label>
                                   <textarea id="lti" name="lti" readonly=""></textarea>

                                       </div>
                                       <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"> <p>Longitud: </p></label>
                                        <textarea id="lgi" name="lgi" readonly=""></textarea>
                                  </div><br> 
                                  <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Hora Actual <?php $hora = new DateTime("now", new DateTimeZone('America/El_Salvador'));
                            echo $hora->format('h:i:s A'); ?>
                                        </label>
                                       
                                    </div>
                                       <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Hora ingreso
                                        </label>
                                        <div class="col-md-12 col-sm-5 col-xs-10">  
                                          <input type="time" class="form-control col-md-4 col-xs-12" id="hora_ingreso" name="hora_ingreso" min="7:00" max="18:00">
                                          </div>
                                    </div>

                                       <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Hora Salida
                                        </label>
                                        <div class="col-md-12 col-sm-5 col-xs-10">  
                                          <input type="time" class="form-control col-md-4 col-xs-12" id="hora_salida" name="hora_salida" min="7:00" max="18:00">
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2 col-xs-12" for="last-name">Fotografias 
                                        </label><br><br>
                                          <div>
                                          <label class="control-label col-md-4 col-sm-2 col-xs-12"><small><strong><p>(Por favor, subir imagenes menores a 2 Mb</p> <p>y con dimensiones no superiores a 1280*980)</p></strong></small></label>
                                          <br>
                                          </div>
                                        <div class="col-md-12 col-sm-5 col-xs-12"> 
                                          <input name = "foto_uno" type = "file" /> <br>
                                          <input name = "foto_dos" type = "file" /> <br>
                                          <input name = "foto_tres" type = "file" /> <br>
                                         <input name = "foto_cuatro" type = "file" /> <br>
                                          <input name = "foto_cinco" type = "file" /> <br>
                                          <input name = "foto_seis" type = "file" />
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2 col-xs-12" for="last-name">Descripcion Solucion 
                                        </label>
                                        <div class="col-md-12 col-sm-5 col-xs-10">                                   
                                         <textarea name="trabajo" id="trabajo" class="form-control" rows="10" cols="30"></textarea>  
                          
                                          </div>
                                    </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado entrega
                                          </label>
                                          <div class="col-md-12 col-sm-5 col-xs-10">
                                            <select id="equipo_queda" name="equipo_queda" class="form-control ">
                                              <option value="Iniciado">Reparado</option>
                                              <option value="Pendiente de Reparar">Pendiente de Reparar</option>
                                              <option value="EnProceso">En espera</option>
                                              <option value="Finalizado">Finalizado</option>                                    
                                            </select>
                                          </div>
                                        </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Nombre quien Recibe
                                      </label>
                                      <div class="col-md-12 col-sm-5 col-xs-10">
                                        <input type="text" id="recibe" name="recibe"  class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-2 col-xs-12" for="last-name">Firma Cliente
                                    </label>
                                    <br> <br> <br>
                                    <div class="col-md-5 col-sm-5 col-xs-10">
                                      <canvas id='canvasCliente' width="300" height="155" style='border: 1px solid #CCC;'>
                                              <p>Tu navegador no soporta canvas</p>
                                          </canvas>

                                      <input type='hidden' name='imagenC' id='imagenC' />

                                   </div>
                                   <div class="control-label col-md-4 col-sm-4 col-xs-12"> <button class="btn btn-warning" type='button' onclick='LimpiarTrazado()'>Borrar</button></div>
                                    </div> <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Firma tecnico<span class="required"></span>
                                    </label>
                                    <br> <br> <br>
                                    <div class="col-md-5 col-sm-5 col-xs-10">
                                      <canvas id='canvas2' width="300" height="155" style='border: 1px solid #CCC;'>
                                              <p>Tu navegador no soporta canvas</p>
                                          </canvas>

                                      <input type='hidden' name='imagen2' id='imagen2' />

                                   </div>
                                   <div class="control-label col-md-4 col-sm-4 col-xs-10">  <button class="btn btn-warning" type='button' onclick='LimpiarTrazado2()'>Borrar</button></div>
                                    </div>
                                    <?php 
                                    echo '<input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/>';
                                     ?>

                                    
                                    <div class="col-md-6 col-sm-6 col-xs-10">
                                        <div class="form-group">
                                        <div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ALERTA:</span>
              
                Por favor, verifique los datos antes de guardar la ficha tecnica.
                </div>


                            <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-3">     
                                                    <?php 
                              if ($id!=0 && $id_producto !=0) {
                                echo '<button type="submit" onclick="GuardarTrazado()" class="btn btn-success">Ingresar</button>';

                              }
                              else{
                                echo "<span class='sr-only'>ALERTA:</span>
              
                Por favor, Seleccione un Equipo o Empresa.
                </div>";   
                                                           }

                              ?>                       
                            </div>
                          </div></div>
                          
                          </div>
                                  </div><!--end col lg 6-->
                                      
                              

           </form>
                          </div> <!--end col lg 12-->
                        </div>   <!--end Row-->
                          </div> <!--end x content-->
                        </div> <!--end x panel-->
                      </div> <!--end col 12-->
                    </div>
                  </div>

			  
            <!--page content -->
      <div id="dataModal2" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Clientes</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms2">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
      </div>
       <div id="dataModal3" class="modal fade">  
                                  <div class="modal-dialog  modal-lg">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Productos</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms3">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
        </div>
         <div id="dataModal4" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Nueva Empresa/Contacto</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms4">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
                </div>
            <!-- footer content -->
            <footer>
              <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>
    <!-- jQuery -->
	 <script src="../vendors/jquery/dist/jquery.min.js"></script>
	 <!-- Bootstrap -->
	 <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    

    <script type="text/javascript" src="../vendors/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="../vendors/ckeditor/ckeditor.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');
    
    </script>
  <script type="text/javascript">
   $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
    
     
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
          var bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listClientes4.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          bandera:bandera},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });
      $(document).on('click', '.view_data2', function(){  
           var employee_id = $(this).attr("id");   
           var employee_name = $(this).attr("nombre");  
          var bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listProductos3.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_name:employee_name,
                           bandera:bandera},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }            
      }); 
       $(document).on('click', '.edit_data', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/modiContacto.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      }); 
         $(document).on('click', '.view_data3', function(){  
           var employee_id = $(this).attr("id");   
          var bandera = $(this).attr("bandera"); 
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/nuevoEC1.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                           bandera:bandera},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }            
      });
       $(document).on('click', '.view_data4', function(){  
           var employee_id = $(this).attr("id");    
           var employee_name = $(this).attr("nombre");  
          var bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/nuevoC1.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_name:employee_name,
                          bandera:bandera},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }            
      });  
       $(document).on('click', '.save_PC', function(){  
           var employee_id = $(this).attr("id");   
           var employee_empresa = $(this).attr("nombre");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/saveClienteProductoFT.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_empresa:employee_empresa},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }            
      }); 
       
  }); 

</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
<script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvasCliente';
    var idCanvas2='canvas2';
    var idForm='demo-form2';
    var inputImagen='imagenC';
    var inputImagen2='imagen2';

    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen); 
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

     var imagen2=document.getElementById(inputImagen2); 
    var anchoCanvas2=document.getElementById(idCanvas2).offsetWidth;
    var altoCanvas2=document.getElementById(idCanvas2).offsetHeight;
    var pizarraCanvas2=document.getElementById(idCanvas2);

     

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;

      contexto.font = "bold 22px sans-serif";
        // Fuente para el texto
      contexto.fillText("hola",50,50);
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc

      pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra

           /* Creamos la pizarra2 */
      pizarraCanvas2.style.cursor=estiloDelCursor;
      contexto2=pizarraCanvas2.getContext('2d');
      contexto2.fillStyle=colorDeFondo;
      contexto2.fillRect(0,0,anchoCanvas2,altoCanvas2);
      contexto2.strokeStyle=colorDelTrazo;
      contexto2.lineWidth=grosorDelTrazo;
      contexto2.lineJoin='round';
      contexto2.lineCap='round';
      contexto2.font = "40px Calibri, Arial";
        // Fuente para el texto
      contexto2.fillText("hola",0,0);
      /* Capturamos los diferentes eventos */
      pizarraCanvas2.addEventListener('mousedown',MouseDown2,false);// Click pc
      pizarraCanvas2.addEventListener('mouseup',MouseUp2,false);// fin click pc
      pizarraCanvas2.addEventListener('mousemove',MouseMove2,false);// arrastrar pc

      pizarraCanvas2.addEventListener('touchstart',TouchStart2,false);// tocar pantalla tactil
      pizarraCanvas2.addEventListener('touchmove',TouchMove2,false);// arrastras pantalla tactil
      pizarraCanvas2.addEventListener('touchend',TouchEnd2,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas2.addEventListener('touchleave',TouchEnd2,false);// fin tocar pantalla fuera de la pizarra

    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }
    function MouseDown2(e){
      flag=true;
      contexto2.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas2); valY=e.pageY-posicionY(pizarraCanvas2);
      contexto2.moveTo(valX,valY);
    }

    function MouseUp2(e){
      contexto2.closePath();
      flag=false;
    }

    function MouseMove2(e){
      if(flag){
        contexto2.beginPath();
        contexto2.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas2); valY=e.pageY-posicionY(pizarraCanvas2);
        contexto2.lineTo(valX,valY);
        contexto2.closePath();
        contexto2.stroke();
      }
    }

    function TouchMove2(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove2(touch);
      }
    }

    function TouchStart2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown2(touch);
      }
    }

    function TouchEnd2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp2(touch);
      }
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }
    function LimpiarTrazado2(){
      contexto2=document.getElementById(idCanvas2).getContext('2d');
      contexto2.fillStyle=colorDeFondo;
      contexto2.fillRect(0,0,anchoCanvas2,altoCanvas2);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      imagen2.value=document.getElementById(idCanvas2).toDataURL('image/png');
      document.forms[idForm].submit();
    }
</script>

<script type="text/javascript">

CKEDITOR.replace('falla');

CKEDITOR.replace('trabajo');

</script>
        
    </body>
</html>