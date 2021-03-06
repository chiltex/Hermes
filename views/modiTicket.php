<?php 
  $id_ticket=$_GET["id"];
  session_start();
  if(isset($_SESSION['tiempo']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 1200;//20min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

            //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
            if($vida_session > $inactivo)
            {
                //Removemos sesión.
                session_unset();
                //Destruimos sesión.
                session_destroy();              
                //Redirigimos pagina.
                header("Location: ../index.php");

                exit();
            }

    }
    $_SESSION['tiempo'] = time();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

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
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="../indexAdmin.php" class="site_title"><i class="fa fa-paw"></i> <span>Hermes</span></a>
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,<!--</span><h2><?php //echo''.$_SESSION['nombre_usuario']; ?>--></h2>
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
                        <img src="images/img.jpg" alt="">John Doe<h2><!--</span><h2><?php //echo''.$_SESSION['nombre_usuario']; ?>--></h2>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                         <li>
                          <a href="../views/modiContra.php">
                            <span>Cambiar Contraseña</span>
                          </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
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
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2> Modificar Ticket</h2>
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
                        <br />
                        <div class="row">
                          <div class="col-lg-12">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/TicketControlador.php?accion=modificar" method="post">
                               <?php 
                                      if (isset($_GET['bandera'])) {
                                        $bandera=$_GET['bandera'];
                                        echo '<input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/>';
                                     
                                       
                                      }
                                      else
                                        $bandera =Null;
                                       ?>
                             
                                <?php 
                                      require_once "../class/Ticket.php";
                                      require_once "../class/Cliente.php";
                               
                                $MiTicket = new Ticket();
                                $cl = $MiTicket->selectOne($id_ticket);
                                foreach ($cl as $field) {
                                          $MiCliente = new Cliente();
                                $cli = $MiCliente->selectOne($field["id_cliente"]);
                                    foreach ($cli as $key ) {
                                    echo '
                                         <div class="col-xs-8"><h4>Empresa:<strong> '.$key["nombre"].'</strong></h4></div>
                                             <input type="hidden" name="id_ticket" id="id_ticket" value="'.$id_ticket.'"/> 
                                             <input type="hidden" name="nombre_empresa" id="nombre_empresa" value="'.$key['nombre'].'"/> 
                              
                                         ';
                                             $iCliente=$field["id_cliente"];
                                             $nCliente=$key['nombre'];
                                    }?>
                                    <div class="form-group">
                                      <label class="control-label col-md-4 col-xs-3 col-xs-6" for="first-name">Contacto:<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-8 col-xs-12">
                                      <table id="example2 datatable-buttons" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th>Contacto</th>
                                          <th>Numero</th>
                                          <th>E-mail</th>                                                                
                                          <th>Seleccionar</th>                          
                                        </tr>
                                      </thead>
                                      <TBODY>
                                         <?php 
                                         require_once "../class/Ticket.php";
                                         $ms = new Ticket();
                                         $contacto = $ms->selectOneC($field["id_cliente"]);
                                         $contacto_seleccionado = $field['id_contacto'];
                                         foreach ((array)$contacto as $r) {
                                          if ($r['id_contacto']== $contacto_seleccionado) {
                                            
                                         echo '
                                          <tr>
                                           <td>'.$r['nombre'].'</td>
                                           <td>'.$r["telefono"].'</td>
                                           <td>'.$r["correo"].'</td>
                                            <td>
                                            <input type="radio" name="id_contacto" id="id_contacto" checked value="'.$r["id_contacto"].'" />
                                             <input type="hidden" name="id_cliente" id="id_cliente" value="'.$field["id_cliente"].'"/>
                                           </td>
                                          </tr>
                                         ';
                                          }else{
                                         echo '
                                          <tr>
                                           <td>'.$r['nombre'].'</td>
                                           <td>'.$r["telefono"].'</td>
                                           <td>'.$r["correo"].'</td>
                                            <td>
                                            <input type="radio" name="id_contacto" id="id_contacto"  value="'.$r["id_contacto"].'" />
                                             <input type="hidden" name="id_cliente" id="id_cliente" value="'.$field["id_cliente"].'"/>
                                           </td>
                                          </tr>
                                         ';}
                                     
                                         
                                         $iContacto=$field["id_contacto"];

                                       }
                                     
                                     
                                                     ?>
                                          </TBODY>
                                        </table>
                                      
                                           </div>
                                           </div>
                                           <div class="form-group">

                                        <label class="control-label col-md-3 col-xs-3 col-xs-6" for="last-name"><span class="required">*</span>
                                        </label>
                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                             <?php  require_once "../class/Ticket.php";
                                         $cp = new Ticket();
                                         $contacto = $cp->selectPr($field["id_producto"],$field["id_cliente"]);
                                         foreach ((array)$contacto as $v) {

                                              echo '
                                                <div class="col-xs-8"><h2>Producto:<strong> '.$v["nombre"].'</strong>  Codigo serie: <strong> '.$v["codigo_serie"].'</strong></h2></div> 
                                  <div class="col-sm-12">
                                              <input type="hidden" name="id_producto" id="id_producto" value="'.$v["id_producto"].'"/>
                                                  ';
                                                  $iProducto=$v["id_producto"];
                                                  $nProducto=$v["nombre"];
                                                  $cProducto=$v["codigo_serie"];
                                                }

                                             ?>
                                           </div>
                                           </div>
                                           <br>
                                           <br><br>
                                        <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-4 col-xs-12" for="last-name">Ficha Tecnica: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <?php
                                   
                                                if ($field['id_ficha_tecnica']==NULL || $field['id_ficha_tecnica']==0) {
                                             echo '
                                                    <a href="../views/saveFT_T.php?cliente='.$iCliente.'&id_producto='.$iProducto.'&nombre='.$nCliente.'&producto='.$nProducto.'&codigo_serie='.$cProducto.'&ticket='.$id_ticket.'&bandera='.$bandera.'&falla='.$field['descripcion'].'" class="btn btn-success">Añadir Ficha Tecnica</a>
                                                  ';
                                              }
                                           else{
                                                  echo '
                                                  <h2><strong> '.$field['id_ficha_tecnica'].'</strong></h2>
                                                  <input type="hidden" name="id_ficha_tecnica" id="id_ficha_tecnica" value="'.$field['id_ficha_tecnica'].'"/>
                                                  <input type="button" name="view" value="Ver Detalle" id="'.$field['id_ficha_tecnica'].'" class="btn btn-info view_data5"/>
                                                   '; 

                                              }
                                             
                                           ?>
                                        </div>
                                    </div><br><br>
                                        <div class="form-group">
                                      <label class="control-label col-md-3 col-xs-3 col-xs-6" for="first-name">Gestion<span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select id="id_gestion" onchange="mostrarInfo1(this.value)" name="id_gestion" class="form-control ">  
                                        <?php
                                         require_once "../class/Ticket.php";
                                             $gestion = new Ticket();
                                             $ges=$gestion->selectOneTG($field["id_tipo_gestion"]);
                                             $gest=$gestion->selectALLG();
                                          foreach ((array)$ges as $raw) {
                                           $gestion_seleccionada = $raw['id_gestion'];
                                           $tipogestion = $raw['id_tipo_gestion'];
                                         }
                                          foreach ((array)$gest as $a) {
                                            if ($gestion_seleccionada== $a['id_gestion']) {
                                             echo '
                                            <option value="'.$a["id_gestion"].'" selected>'.$a["nombre"].'</option>
                                           ';
                                            }else{
                                              echo '
                                            <option value="'.$a["id_gestion"].'">'.$a["nombre"].'</option>
                                           ';
                                            }
                                           
                                         }
                                       
                                       
                                           ?>                                
                                        </select>
                                      </div>
                                    </div>
                                     <div class="form-group">
                                     <div id="datos1">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-6" for="last-name">Tipo Gestion <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" >

                                      <select  id="id_tipo_gestion" name="id_tipo_gestion" class="form-control ">
                                         <?php
                                        
                                             $tg = new Ticket();
                                             $Tgo=$tg->selectOneTG($tipogestion);                                             
                                             $DTgo=$tg->selectALLTG($gestion_seleccionada);
                                          foreach ((array)$Tgo as $riw) {
                                            $tipogestion_seleccionada = $riw['id_tipo_gestion'];
                                         }
                                           foreach ((array)$DTgo as $b) {
                                            if ($tipogestion_seleccionada == $b['id_tipo_gestion']) {
                                              
                                           echo '
                                            <option value="'.$b["id_tipo_gestion"].'" selected>'.$b["nombre"].'</option>
                                           ';
                                            }else{

                                           echo '
                                            <option value="'.$b["id_tipo_gestion"].'">'.$b["nombre"].'</option>
                                           ';
                                            }
                                         }
                                       
                                       
                                           ?>
                                          
                                      </select>
                                   </div>
                                   </div>
                                    </div>
                                    <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">                                   
                                         <?php 
                                         echo '  <textarea name="descripcion" id="descripcion" class="form-control">'.$field["descripcion"].'</textarea>  ';
                                          ?>
                                            
                                          </div>
                                        </div>
                                     <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Solucion<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12"> 
                                          <?php 
                                          echo ' <textarea name="solucion" id="solucion" class="form-control">'.$field["Solucion"].'</textarea>  
                          
                                          ';
                                           ?>                                  
                                        </div>
                                        </div>
                                 <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="estado" name="estado" class="form-control ">
                                              <?php 
                                              if ($field["estado"]=="Iniciado") {
                                                echo '  <option value="Iniciado">Iniciado</option>
                                              <option value="En Proceso">En Proceso</option>
                                              <option value="Finalizado">Finalizado</option> ';
                                              }elseif ($field["estado"]=="En Proceso") {
                                               echo '  
                                              <option value="En Proceso">En Proceso</option>
                                              <option value="Iniciado">Iniciado</option>
                                              <option value="Finalizado">Finalizado</option> ';
                                              }elseif ($field["estado"]=="Finalizado") {
                                               echo '
                                              <option value="Finalizado">Finalizado</option>  
                                              <option value="En Proceso">En Proceso</option>
                                              <option value="Iniciado">Iniciado</option> ';
                                              }

                                               ?>
                                                                               
                                            </select>
                                          </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo Usuario <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          
                                             <?php
                                             echo '
                                                    <select onchange="mostrarInfo(this.value)" id="id_tipo_usuario" name="id_tipo_usuario" class="form-control ">

                                                 ';
                                             require_once "../class/Usuario.php";
                                                 $usua = new Usuario();
                                                 $usuar=$usua->selectOneTU($field["id_usuario"]);
                                                 $dusuar=$usua->selectAllTipUsuario();

                                                     foreach ((array)$usuar as $w) {
                                                        $seleccionado = $w['id_tipo_usuario'];
                                                        }

                                                 foreach ($dusuar as $k) {
                                                        if ($seleccionado == $k['id_tipo_usuario']) {
                                                             echo '
                                                              <option value="'.$k["id_tipo_usuario"].'" selected>'.$k["nombre"].'</option>
                                                             ';
                                                          }else{
                                                           echo '
                                                              <option value="'.$k["id_tipo_usuario"].'" >'.$k["nombre"].'</option>
                                                             '; 
                                                          }
                                                 }
                                                  ?>
                                              
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="datos">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario Responsable <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select  id="id_usuario" name="id_usuario" class="form-control">
                                             <?php
                                             require_once "../class/Usuario.php";
                                                 $usuario1 = new Usuario();
                                                 $usuar=$usuario1->selectTecnicos($seleccionado);
                                                 $dusuar=$usuario1->selectALLJ1($seleccionado);
                                               //  foreach ($usuar as $keyss) {
                                                  $usuario_seleccionado = $field['id_usuario'];
                                                 //}
                                            foreach ((array)$dusuar as $w) {
                                                  if ($usuario_seleccionado == $w['id_usuario']) {
                                                  
                                               echo '
                                                <option value="'.$w["id_usuario"].'" selected>'.$w["nombre"].' '.$w["apellido"].'</option>
                                               ';
                                                  }else{

                                               echo '
                                                <option value="'.$w["id_usuario"].'">'.$w["nombre"].' '.$w["apellido"].'</option>
                                               ';
                                                  }

                                             }
                                           
                                           
                                               ?>
                                              
                                            </select>
                                            </div>

                                        </div>
                                    </div>
                                      <?php 
                                      if (isset($_POST['bandera'])) {
                                        $bandera=$_POST['bandera'];
                                        echo '<input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/>';
                                      }

              $correo_eliminar = $_SESSION['correo'];
              if ($correo_eliminar == "pcumez@hermes.com.gt" || $correo_eliminar == "serviciotecnico@hermes.com.gt" || $correo_eliminar == "npinto@hermes.com.gt" || $correo_eliminar == "cfuentes@hermes.com.gt" || $correo_eliminar == "administrador@gmail.com" ) {

                                    
                                       ?>


                                       <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class='input-group date' id='myDatepicker2'>
                                            <?php 
                                             require_once "../class/Events1.php";
                                                 $eventos = new Events();

                                                 $evento1 = $eventos->selectDate($id_ticket);
                                                 if ($evento1 != "00/00/0000") {
                                                    foreach ($evento1 as $eys) {

                                                     echo "<input type='text' class='form-control' name='fecha' id='fecha' value='".$eys['fecha']."' />";
                                                   }
                                                 }else{

                                                     echo "<input type='text' class='form-control' name='fecha' id='fecha' />";
                                                 }
                                                

                                             ?>
                                            <span class="input-group-addon">
                                               <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hora solucion <?php $hora = new DateTime("now", new DateTimeZone('America/El_Salvador'));
                            echo $hora->format('h:i:s A'); ?>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">  
                                           <?php 
                                                
                                                 $evento2 = new Events();
                                                 $evento11=$evento2->selectHour($id_ticket);
                                                 if ($evento11 != "00:00:00") {
                                                  foreach ($evento11 as $keys1) {
                                                   echo '<input type="time" class="form-control" id="hora_solucion" name="hora_solucion" min="7:00" max="18:00" value="'.$keys1['hora'].'" />';
                                                 }
                                                 }else{
                                                  echo '<input type="time" class="form-control" id="hora_solucion" name="hora_solucion" min="7:00" max="18:00" />';
                                                 }
                                                 

                                             ?>
                                          
                                          </div>
                                    </div>
                                    <?php 
                                    }
                                     ?>



                                         <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><strong>Urgente</strong><span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12"> 

                                            <?php 
                                              if ($field['urgente'] =="Si") {

                                               echo'<input type="checkbox" name="urgente" checked id="urgente" value="Si">';
                                              }
                                              else{
                                                echo'<input type="checkbox" name="urgente" id="urgente" value="Si">';
                                              }
                                             ?>
                                        
                                          </div>
                                        </div>

                                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                          </div>
                                  <
                                <?php 

                                 }
                                 ?>

                              </form>
                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                                  <div class="modal-dialog">  
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    
    <script type="text/javascript" src="../vendors/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="../vendors/ckeditor/ckeditor.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
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
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listClientes3.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
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
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listProductos2.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_name:employee_name},  
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
      $(document).on('click', '.view_data5', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/selecFT.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });
       
  }); 
      function mostrarInfo(cod){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }else{ 
  document.getElementById("datos").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/STU.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);
};

function mostrarInfo1(cod){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos1").innerHTML=xmlhttp.responseText;
    }else{ 
  document.getElementById("datos1").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/SG.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);
};

</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
        <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script type="text/javascript">

CKEDITOR.replace('solucion');

CKEDITOR.replace('descripcion');

</script>

    </body>
</html>