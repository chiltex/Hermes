<?php
session_start();
require_once "class/Events.php";
 $misEvents = new Events();
 if (isset($_GET['id'])) {
  $codigo1=$_GET['id'];
 }else{
  $codigo1 = 0;
 }
 
 $tipo_n = $_SESSION['tipo'];
 $identificador = $_SESSION['id_usuario'];
 if ($tipo_n !="Administrador" || $tipo_n !="Administrativo") {
  $events = $misEvents->selectALLONE($identificador);  
 }else{
  if ($codigo1==0) {
  $events = $misEvents->selectALL();
 }else{
  $events = $misEvents->selectALLONE($codigo1);  
 }
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HERMES | CRM</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
      <!-- FullCalendar -->
  <link href='calendar/css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
    }
  #calendar {
    max-width: 800px;
  }
  .col-centered{
    float: none;
    margin: 0 auto;
  }
    </style>
</head>
<body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="indexAdmin.php?id=0&nombre=Seleccione un Tecnico" class="site_title"><i class="fa fa-paw"></i> <span>Hermes</span></a>
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>User</h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->
    
                <br />
    
                <!-- sidebar menu -->
                <?php

if (isset($_SESSION['id_tipo_usuario'])) {
 $codigo= $_SESSION['id_tipo_usuario']; 
}else{
   echo '
              <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
                Porfavor inicie sesion.

                                    <a href="../index.php" class="btn btn-danger">Iniciar Sesion</a>
           
                </div>';
}

?>
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>General</h3>
                     <?php 
                      require_once "class/Permisos_1.php";
                          $misPermisoss = new Permisos();
                         $catego = $misPermisoss->selectOne($codigo);
                          foreach ((array)$catego as $row) {

                     ?>
                    <ul class="nav side-menu">
                        <?php 
                        if ($row['campo_a']!=NULL && $row['campo_b']!= NULL && $row['campo_o']!= NULL ) {
                          ?>
                      <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="listas/TipoUsuario.php">Tipos de Usuarios</a></li>
                           <li><a href="listas/Permisos.php">Permisos</a></li>
                        </ul>
                      </li>
                      <?php 
                         } elseif ($row['campo_a']!=NULL && $row['campo_b']== NULL && $row['campo_o']!= NULL ){  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="listas/Permisos.php">Permisos</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_a']!=NULL && $row['campo_b']!= NULL && $row['campo_o']== NULL) {  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="listas/TipoUsuario.php">Tipos de Usuarios</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_a']!=NULL && $row['campo_b']== NULL && $row['campo_o']== NULL) {  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Usuarios.php">Usuarios</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_c']!=NULL && $row['campo_d']!= NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/clientes.php">Clientes</a></li>
                          <li><a href="listas/lista_categorias.php">Categorias</a></li>
                          <li><a href="listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_c']!=NULL && $row['campo_d']== NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/clientes.php">Clientes</a></li>
                          <li><a href="listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_c']!=NULL && $row['campo_d']!= NULL && $row['campo_e']== NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/clientes.php">Clientes</a></li>
                          <li><a href="listas/lista_categorias.php">Categorias</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_c']==NULL && $row['campo_d']!= NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                      
                          <li><a href="listas/lista_categorias.php">Categorias</a></li>
                          <li><a href="listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_c']!=NULL && $row['campo_d']== NULL && $row['campo_e']== NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/clientes.php">Clientes</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_f']!=NULL && $row['campo_g']!= NULL && $row['campo_h']!= NULL && $row['campo_i']!= NULL) {  ?>
                       <li><a><i class="fa fa-desktop"></i> Productos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                         <li><a href="listas/lista_grupo_producto.php">Grupo de Productos</a></li>
                          <li><a href="listas/Productos.php">Productos</a></li>
                          <li><a href="listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>
                          <li><a href="listas/Repuestos.php">Repuestos</a></li>
                          <li><a href="listas/Consumibles.php">Consumibles</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_f']==NULL && $row['campo_g']!= NULL && $row['campo_h']!= NULL && $row['campo_i']!= NULL) {  ?>
                       <li><a><i class="fa fa-desktop"></i> Productos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                         
                          <li><a href="listas/Productos.php">Productos</a></li>
                          <li><a href="listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>
                          <li><a href="listas/Repuestos.php">Repuestos</a></li>
                          <li><a href="listas/Consumibles.php">Consumibles</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_j']!=NULL) {  ?>
                         <li><a><i class="fa fa-table"></i> Tickets <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0">Ticket</a></li>
                      </ul>
                      </li>
                      <?php 
                        }if ($row['campo_k']!=NULL && $row['campo_l']!= NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Gestion.php">Gestion</a></li>
                          <li><a href="listas/TipoGestion.php">Tipo de Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_k']!=NULL && $row['campo_l']== NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/Gestion.php">Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_k']==NULL && $row['campo_l']!= NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="listas/TipoGestion.php">Tipo de Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_m']!=NULL) {  ?>
                         <li><a><i class="fa fa-clone"></i>Fichas Tecnicas <span class="fa fa-chevron-down"></span></a>
                      
                        <ul class="nav child_menu">
                          <li><a href="views/saveFT.php?cliente=0&id_producto=0&producto=N/A&codigo_serie=0000&nombre=N/A">Ficha Tecnica</a></li>
                          <li><a href="listas/FichaTecnca.php">Fichas Tecnica</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_n']!=NULL) {  ?>
                         <li><a><i class="glyphicon glyphicon-tags"></i>         Tareas <span class="fa fa-chevron-down"></span></a>
                      
                        <ul class="nav child_menu">
                         <li><a href="indexAdmin.php?id=0&nombre=Seleccione%20un%20Tecnico">Tareas</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_p']!=NULL) {  ?>
                         <li><a><i class="fa fa-clone"></i>Extras <span class="fa fa-chevron-down"></span></a>
                      
                        <ul class="nav child_menu">
                          <li><a href="listas/FormularioRetorno.php">Formulario Retorno</a></li>
                          <li><a href="listas/lista_partFailure.php">Part Failure</a></li>
                          <li><a href="listas/lista_Calidad.php">Reportes de Calidad</a></li>
                        </ul>
                        </ul>
                      </li>
                      <?php 
                        }
                       ?>                     
                       </ul>
                    <?php 
                    } ?>
                  </div>
                  
    
                </div>
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
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="controller/LoginControlador.php?accion=logout">
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
                        <img src="images/img.jpg" alt="">John Doe
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        
                        <li><a href="controller/LoginControlador.php?accion=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                      </ul>
                    </li>
    
                  
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->
    
            <!-- page content -->
            <div class="right_col" role="main">
              
        
              

        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bienvenido </h2>


                    
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
                     <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Agenda</h1>
                <div class="row">
                
<?php 
  if ($tipo_n != "Administrador" || $tipo_n != "Administrativo") {
   
  }
  else{
 ?>
                <form name="form1" role="form" action="indexAdmin.php" method="GET">
                  <div class="box-body">
                  <div class="form-group">
                      <label for="codigo">Tipo Usuario:</label>
                      <select  id="id_tipo_usuario" name="id_tipo_usuario" class="form-control ">
                                 <?php 
                                 if (isset($_GET['id_tipo_usuario'])){
                                   $idtu = $_GET['id_tipo_usuario'];
                                       require_once "class/Permisos_1.php";
                                       $misTU = new Permisos();
                                       $tc1 = $misTU->selectAllTipUsuario1($idtu);
                                       foreach ((array)$tc1 as $row1) {
                                       echo '
                                        <option value="'.$row1["id_tipo_usuario"].'">'.$row1["nombre"].'</option>
                                       ';
                                     }
                                      $dtc1 = $misTU->selectAllTipUsuarioD($idtu);
                                       foreach ((array)$dtc1 as $row1) {
                                       echo '
                                        <option value="'.$row1["id_tipo_usuario"].'">'.$row1["nombre"].'</option>
                                       ';
                                     }
                              
                                 }
                                 else{
                                              require_once "class/Permisos_1.php";
                                     $misTU = new Permisos();
                                     $tc = $misTU->selectAllTipUsuario();
                                     foreach ((array)$tc as $row) {
                                     echo '
                                      <option value="'.$row["id_tipo_usuario"].'">'.$row["nombre"].'</option>
                                     ';
                                   }
                                 }
                             echo '<input type="hidden" name="id" value="'.$codigo1.'"class="form-control" id="id_usuario1">
              <input type="hidden" name="nu" value="'.$nombre.'"class="form-control" id="nu">';
                              
                     
                         ?>
                                  
                              </select>
                  </div>
                   <input type="submit" class="btn btn-primary" name="consultar" value="Consultar" >
                  </div>
                </form>
                          <div class="col-sm-4">
                          <?php
                  if (isset($_GET['id_tipo_usuario'])) {
                    $id_tu=$_GET['id_tipo_usuario'];
                    echo ' <input type="button" name="view" value="Seleccionar Usuario" id="'.$id_tu.'" class="btn btn-info view_data"/>';
                  }else
                  {
                    $id_tu=0;
                  }
                 ?>

                       
                          </div>
                        <?php
                        if (isset($_GET["id"]) && isset($_GET["nombre"])) {
                          $id=$_GET["id"];
                        
                          $nombre=$_GET["nombre"];
                           echo '<div class="col-md-4"><h4><strong> '.$nombre.'</strong></h4></div> 
                            <div class="col-sm-2">
                              <a href="indexAdmin.php?id=0&nombre=Seleccione un Operador" class="btn btn-danger">Ver Todos</a>
                            </div> 
                            ';
                            }else{
                            echo "<h3>Seleccione un Tecnico.</h3> ";

                            }
                             }

                        ?>
                            
                </div>
                <div id="calendar" class="col-centered">
                </div>
            </div>
      
        </div>
        <!-- /.row -->
    
    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="EventsControlador.php?accion=guardar">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titulo</label>
            <div class="col-sm-10">
              <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Titulo">
            </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Descripcion</label>
          <div class="col-sm-10">
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
                    <option value="">Seleccionar</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
              
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="text" name="end" class="form-control" id="end" readonly>
          </div>
          </div>
          <?php 
          if ($tipo_n !="Administrador" || $tipo_n != "Administrativo") {
              $id_tu = $_SESSION['id_tipo_usuario'];
              $id_usu = $_SESSION['id_usuario'];
              echo '
              <input type="hidden" name="id_usuario" value="'.$id_usu.'"class="form-control" id="id_usuario">
              <input type="hidden" name="tipo_u" value="'.$id_tu.'"class="form-control" id="id_tipou">

              ';
          }else{
            if ($id_tu==0) {
              echo ' <div class="form-group">
          }
          <label for="end" class="col-sm-2 control-label">Operador</label>
          <div class="col-sm-10">
             <select  id="id_usuario" name="id_usuario" class="form-control "> ';
               $TU=$misEvents->selectOperadores();
             foreach ((array)$TU as $row) {
                         echo '
                          <option value="'.$row["id_usuario"].'">'.$row["nombre"].' '.$row["apellido"].'</option>
                         ';
                }
                echo'
            </select>
          </div>
          </div>
               
              <input type="hidden" name="id_usuario1" value="'.$codigo.'"class="form-control" id="id_usuario1">
              <input type="hidden" name="nu" value="'.$nombre.'"class="form-control" id="nu">
 ';
             }else{
              $id_usu =$_GET['id'];
              echo '
              <input type="hidden" name="id_usuario" value="'.$id_usu.'"class="form-control" id="id_usuario">
              <input type="hidden" name="tipo_u" value="'.$id_tu.'"class="form-control" id="id_tipou">

              ';


             }
           }
             ?>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="EventsControlador.php?accion=modificar">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
        </div>
        <div class="modal-body">
          <?php 
              echo '
              <input type="hidden" name="id_usuario" value="'.$id.'"class="form-control" id="id_usuario">
              <input type="hidden" name="nu" value="'.$nombre.'"class="form-control" id="nu">

              ';
           ?>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titulo</label>
          <div class="col-sm-10">
            <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Titulo">
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Descripcion</label>
          <div class="col-sm-10">
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Titulo">
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Seleccionar</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
              
            </select>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <?php 
              $correo_eliminar = $_SESSION['correo'];
              if ($correo_eliminar == "pcumez@hermes.com.gt" || $correo_eliminar == "serviciotecnico@hermes.com.gt" || $correo_eliminar == "npinto@hermes.com.gt" || $correo_eliminar == "cfuentes@hermes.com.gt"  || $correo_eliminar == "administrador@gmail.com") {
               echo '
               <div class="checkbox">
              <label class="text-danger"><input type="checkbox" id="eliminar" name="eliminar"> Eliminar Evento</label>
              </div';
              }

               ?>
             <!-- <div class="checkbox">
              <label class="text-danger"><input type="checkbox" id="eliminar" name="eliminar"> Eliminar Evento</label>
              </div>-->
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      </div>
      </div>
    </div>
                </div>
                  <div class="x_content">


     




                      

                                    
                    <br>
                    <br>
                    <div id="employee_table">
                    
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
                                                 <h4 class="modal-title">Operadores</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms2">  
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
   <script src="vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script src="calendar/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="calendar/js/bootstrap.min.js"></script>
<!-- Google Analytics -->
    <!-- FullCalendar -->
  <script src='calendar/js/moment.min.js'></script>
  <script src='calendar/js/fullcalendar/fullcalendar.min.js'></script>
  <script src='calendar/js/fullcalendar/fullcalendar.js'></script>
  <script src='calendar/js/fullcalendar/locale/es.js'></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');
    
    </script>

<script>

  $(document).ready(function() {

    var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
    
    $('#calendar').fullCalendar({
      header: {
         language: 'es',
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay',

      },
      defaultDate: yyyy+"-"+mm+"-"+dd,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #tittle').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit #descripcion').val(event.descripcion);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
          descripcion: '<?php echo $event['descripcion']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
    
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      <?php 
        if ($codigo!=0){
       ?>
      
      $.ajax({
       url: 'EventsControlador.php?accion=date',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
         
        }

      });  
    <?php } else{?>
        alert('Seleccione un Tecnico Para modficar la cita seleccionada. O intente ingresando nuevamente la cita'); 
      <?php      }?>
    }
    
  });

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
                     url:"views/listUsuarios.php",  
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
    </body>
</html>