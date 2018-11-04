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
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
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
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                    <h2>Pagina de Contactos</h2>
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
                    
  


            <?php 
            if (isset($_GET['success'])) {
                
                if ($_GET['success']=='correcto') {
                    
                    echo '
              <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Correcto:</span>
                Los datos han sido guardados exitosamente.
           
                    ';
                }
            }elseif (isset($_GET['error'])) {
              $msj=$_GET['msj'];
               if ($_GET['error']=='incorrecto') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorecto:</span>
              
                Error al guardar, verifique los datos ingresados.

           
                    ';
                }
            }elseif (isset($_GET['seleccion'])) {
               if ($_GET['seleccion']=='nuevo') {
                    
                    echo '
                 <div class="alert alert-primary" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Atencion:</span>
              
                Ingrese todos los datos.
            
                    ';
                }
            }
             ?></div>
             
                    <br>
                    <br>
                    

                    <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Agregar contacto</h2>
                       
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <input type="button" name="view" value="Seleccionar Cliente" id="1" class="btn btn-info view_data"/>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/ContactoControlador.php?accion=guardar" method="post">
                        <?php

                          $id=$_GET["id"];
                          $nombre=$_GET["nombre"];
                          if ($id!="" && $nombre != "") {
                              echo'
                               <div class="row">
                               <div class="row">
                              
                               <br>
                    <div class="col-xs-12">  

                               <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Empresa: '.$nombre.'
                                  </label>
                               </div>

                          <div class="col-md-4">
                              <div class="form-group">

                                <label class="control-label col-md-3 col-sm-4 col-xs-8" for="first-name">Nombre Contacto <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-xs-5 col-xs-12">
                                  <input type="text" id="nombre" name="nombre" value=""  required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label col-md-2 col-xs-3 col-xs-8" for="first-name">Puesto
                                </label>
                                <div class="col-md-5 col-xs-5 col-xs-12">
                                  <input type="text" id="puesto" name="puesto" class="form-control col-md-3 col-xs-6">
                                </div>
                              </div>
                          </div>
                     
                          <input type="hidden" id="id_cliente" name="id_cliente" value="'.$id.'">

                          <input type="hidden" id="nombreC" name="nombreC" value="'.$nombre.'">
                               ';
                            }else{
                             echo'
                              <div class="row"> 
                              <div class="col-xs-12">   
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nombre Contacto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-xs-6 col-xs-12">
                              <input type="text" id="nombre" name="nombre" value="Seleccione un nombre..." required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                         
                              </div>
                               ';

                            }

                        ?>   
                            
                               <div class="col-md-4">   
                                  <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-2 col-xs-8" for="first-name">Correo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-xs-4 col-xs-8">
                                      <input type="text" id="correo" name="correo" required="required" class="form-control col-md-5 col-xs-12">
                                    </div>
                                  </div>
                              </div> 
                              </div>
                              </div>
                        </div>
                        <dir class="row">
                          <div class="col-md-4">  
                              <div class="form-group">
                                <label class="control-label col-md-3 col-xs-3 col-xs-12" for="first-name">Telefono Contacto</label>
                                <div class="col-md-5 col-xs-6 col-xs-12">
                                  <input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-3 col-xs-6">
                                </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-xs-4 col-xs-7" for="first-name">Extension
                            </label>
                            <div class="col-md-5 col-xs-6 col-xs-12">
                              <input type="text" id="extension" name="extension"  class="form-control col-md-3 col-xs-6">
                            </div>
                          </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label col-md-4 col-xs-2 col-xs-12" for="first-name">Movil
                            </label>
                            <div class="col-md-5 col-xs-6 col-xs-12">
                              <input type="text" id="movil" name="movil" class="form-control col-md-3 col-xs-6">
                            </div>
                          </div>
                          </div>
                           
                         </dir> 
                          
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Agregar Contacto</button>
                            </div>
                          </div>
    
                        </form>
                      </div>
                    </div>
                  </div>
                </div>





                    
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre / Compañia</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Puesto</th>                            
                          <th>Opciones / Mantenimiento</th>                          
                        </tr>
                      </thead>
                      <TBODY>
                         <?php 
                         require_once "../class/Contactos.php";
                         $misContactos = new Contactos();
                         $contacto = $misContactos->selectALL();
                         if ($id!="") {
                           
                         $contacto1 = $misContactos->selectALLE($id);
                           foreach ((array)$contacto1 as $rew) {
                         echo '
                          <tr>
                           <td>'.$rew['nombre'].'</td>
                           <td>'.$rew["correo"].'</td>                           
                           <td>'.$rew["telefono"].'</td>                          
                           <td>'.$rew["puesto"].'</td>
                            <td>
                          
                                    <input type="button" name="view" value="Ver Detalle" id="'.$rew["id_contacto"].'" class="btn btn-info view_data2"/>  
                                    <input type="button" name="edit" value="Editar" id="'.$rew["id_contacto"].'" nombre="'.$nombre.'" empresa="'.$id.'" class="btn btn-warning edit_data" />
                                    <a href="../controller/ContactoControlador.php?id='.$rew["id_contacto"].'&accion=eliminar&id_cliente='.$id.'&nombreC='.$nombre.'" class="btn btn-danger">Eliminar</a>
                           </td>
                          </tr>
                         ';
                       }

                          }else{
                           foreach ((array)$contacto as $row) {
                         echo '
                          <tr>
                           <td>'.$row['nombre'].'</td>
                           <td>'.$row["correo"].'</td>                           
                           <td>'.$row["telefono"].'</td>                        
                           <td>'.$row["puesto"].'</td>
                            <td>
                          
                                    <input type="button" name="view" value="Ver Detalle" id="'.$row["id_contacto"].'" class="btn btn-info view_data2"/>  
                                    <input type="button" name="edit" value="Editar" id="'.$row["id_contacto"].'" class="btn btn-warning edit_data" />
                                    <a href="../controller/ContactoControlador.php?id='.$row["id_contacto"].'&accion=eliminar" class="btn btn-danger">Eliminar</a>
                           </td>
                          </tr>
                         ';
                       }
                     }
                          ?>
                      </TBODY>
                    </table>
                  </div>
                </div>
              </div>
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
                                                 <h4 class="modal-title">Detalle Contacto</h4>  
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
                                                 <h4 class="modal-title">Modificar Contacto</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms4">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
  </div>
			  
			  
            </div>
            <!--page content -->
    
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
                     url:"../views/listClientes.php",  
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
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/selectContacto.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }            
      }); 
       $(document).on('click', '.edit_data', function(){  
          var employee_id = $(this).attr("id"); 
           var employee_nombre = $(this).attr("nombre"); 
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/modiContacto.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_nombre:employee_nombre},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      });  
       
 }); 

</script>

    </body>
</html>