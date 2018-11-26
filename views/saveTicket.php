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
                  <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Hermes</span></a>
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
                        <h2>Agregar Ticket</h2>
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
                            <div class="row">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/TicketControlador.php?accion=guardar" method="post">
                              <div class="col-lg-6">
                                <div class="row">
                                <input type="button" name="view" value="Seleccionar Empresa" id="1" class="btn btn-info view_data"/>

                    <input type="button" name="view" value="Agregar Empresa/Contacto" id="1" class="btn btn-info view_data3"/> 
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
                                           echo ' <input type="button" name="view" value="Agregar Contacto" id="'.$id.'" nombre="'.$nombre.'" class="btn btn-warning view_data4"/>';
                                           # code...
                                         }else{
                                           echo '
                                         <div class="col-xs-8"><h4>Empresa:<strong> '.$nombre.'</strong></h4></div>';
                                         }
                                      

                                      }
                                      ?>
                                      <?php 
                                            echo ' <input type="button" name="view" value="Seleccionar producto" id="'.$id.'" nombre="'.$nombre.'" class="btn btn-info view_data2"/>';

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
                                                <div class="col-xs-8"><h6>Producto:<strong> '.$producto.'</strong>  Codigo serie: <strong> '.$codigo_serie.'</strong></h6></div> 
                                  <div class="col-sm-12">
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
                                         require_once "../class/Ticket.php";
                                         $ms = new Ticket();
                                         $contacto = $ms->selectOneC($id);
                                         foreach ((array)$contacto as $row) {
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
                                     
                                     
                                                     ?>
                                          </TBODY>
                                        </table>
                                        
                                             <!--
                                        <div class="form-group">
                                        <label class="control-label col-sm-3" for="last-name">Ficha Tecnica <span class="required">:</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php 
                                             /* if (isset($_GET['id_ficha_tecnica'])) {
                                                $id_ficha_tecnica=$_GET['id_ficha_tecnica'];
                                                  echo '
                                                  <div class="col-xs-8"><h4><strong> '.$id_ficha_tecnica.'</strong></h4></div>
                                                  <input type="hidden" name="id_ficha_tecnica" id="id_ficha_tecnica" value="'.$id_ficha_tecnica.'"/>
                                                  <input type="button" name="view" value="Ver Detalle" id="'.$id_ficha_tecnica.'" class="btn btn-info view_data5"/>
                                                   ';  
                                              }else{
                                                  echo '
                                                    <a href="../views/saveFT_T.php?cliente='.$id.'&id_producto='.$id_producto.'&nombre='.$nombre.'&producto='.$producto.'&codigo_serie='.$codigo_serie.'" class="btn btn-success">Añadir Ficha Tecnica</a>
                                                  ';

                                              }*/

                                             ?>
                                        </div>
                                    </div>
                                          --> 
                                  </div>
                              </div>
                             </div>  
                             <div class="row"> 
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-9">
                                    <div class="row">
                                           <div class="form-group">
                                      <label class="control-label col-md-3 col-xs-3 col-xs-6" for="first-name">Gestion<span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select onchange="mostrarInfo1(this.value)" id="id_gestion" name="id_gestion" class="form-control ">  
                                        <option value="0">Seleccione una opcion</option>
                                        <?php
                                         require_once "../class/Gestion.php";
                                             $gestion = new Gestion();
                                             $ges=$gestion->selectALL();
                                          
                                             # code...
                                           
                                           foreach ((array)$ges as $raw) {
                                           echo '
                                            <option value="'.$raw["id_gestion"].'">'.$raw["nombre"].'</option>
                                           ';
                                         }
                                       
                                       
                                           ?>                                
                                        </select>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                    
                                        <div id="datos1"></div>
                                    </div>
                                    </br>
                                    <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">                                   
                                         <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                          
                                          </div>
                                        </div>
                                    <!-- <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Solucion<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">                                   
                                         <textarea name="solucion" id="solucion" class="form-control"></textarea>  
                          
                                          </div>
                                        </div> -->
                                    </div>
                                   
                                  </div>
                                <div class="col-lg-9">
                                  <div class="row">
                                  <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="estado" name="estado" class="form-control ">
                                              <option value="Iniciado">Iniciado</option>
                                              <option value="En Proceso">En Proceso</option>
                                              <option value="Finalizado">Finalizado</option>                                    
                                            </select>
                                          </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo Usuario <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select onchange="mostrarInfo(this.value)" id="id_usuario" name="id_usuario" class="form-control ">
                                             <option value="0">Seleccione una opcion</option>
                                             <?php
                                             require_once "../class/TipoUsuario.php";
                                                 $usua = new TipoUsuario();
                                                 $usuar=$usua->selectALL();
                                              
                                                 # code...
                                               
                                               foreach ((array)$usuar as $rew) {
                                               echo '
                                                <option value="'.$rew["id_tipo_usuario"].'">'.$rew["nombre"].'</option>
                                               ';
                                             }
                                           
                                           
                                               ?>
                                              
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="datos"></div>
                                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name="fecha" id="fecha" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                                 
                                        <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><strong>Urgente</strong><span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12"> 
                                        <input type="checkbox" name="urgente" id="urgente" value="Si"> 
                                          </div>
                                        </div>

                                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                          </div>
                                  </div>
                                </div>
                                      
                                    </div>
                              </div>
                              </div>

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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
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
         $(document).on('click', '.view_data3', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/nuevoEC.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
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
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/nuevoC.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_name:employee_name},  
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
    </body>
</html>