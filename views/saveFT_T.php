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
              
        
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Agregar Ficha Tecnica</h2>
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
                          
           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/FichaTecnicaControlador.php?accion=guardar" method="post" ENCTYPE="multipart/form-data">
              <div class="row">
                              <div class="col-lg-6">
                                <div class="row">
                             

                    <input type="button" name="view" value="Agregar Empresa/Contacto" id="1" bandera="ticket" class="btn btn-info view_data3"/> 
                                <?php 
                                      if (is_null($_GET["cliente"])&& is_null($_GET["nombre"])) {
                                       $id=0;
                                       $nombre="N/A";
                                      }else{
                                         $id=$_GET["cliente"];
                                         $nombre=$_GET["nombre"];
                                         $id_producto=$_GET["id_producto"];
                                         $producto=$_GET["producto"];
                                         $codigo_serie=$_GET["codigo_serie"]; 
                                         if ($id!="0" && $nombre!="N/A") {
                                             echo '
                                         <div class="col-xs-8"><h4>Empresa:<strong> '.$nombre.'</strong></h4></div>';
                                           echo ' <input type="button" name="view" value="Agregar Contacto" id="'.$id.'" nombre="'.$nombre.'" bandera="ticket" producto="'.$producto.'" codigo_serie="'.$codigo_serie.'" id_producto="'.$id_producto.'" class="btn btn-warning view_data4"/>
                                           <input type="hidden" name="empresa" id="empresa" value="'.$nombre.'"/>

                                           ';
                                           # code...
                                         }else{
                                           echo '
                                         <div class="col-xs-8"><h4>Empresa:<strong> '.$nombre.'</strong></h4></div>';
                                         }
                                      

                                      }
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

                                         
                                         $id_usuario=$_SESSION['id_usuario'];
                                         echo '<input type="hidden" name="id_usuario" id="id_usuario" value="'.$id_usuario.'"/>
                                         <input type="hidden" name="codigo_serie" id="codigo_serie" value="'.$codigo_serie.'"/>';
                                     
                                     
                                                     ?>
                                          </TBODY>
                                        </table>
                                        <?php 
                                           

                                            if (is_null($_GET["id_producto"]) && is_null($_GET["codigo_serie"])&& is_null($_GET["producto"])) {
                                               $id_producto=0;
                                               $codigo_serie=0000;
                                               $producto="N/A";
                                              }else{
                                                 $id_producto=$_GET["id_producto"];
                                                 $codigo_serie=$_GET["codigo_serie"];
                                                  $producto=$_GET["producto"];
                                                  $id_ticket=$_GET["ticket"];
                                              }
                                              echo '
                                                <div class="col-xs-8"><h4>Producto:<strong> '.$producto.'</strong></h4></div>
                                                <div class="col-xs-8"><h4>Codigo serie: <strong> '.$codigo_serie.'</strong></h4></div>  
                                 <div class="col-xs-12">
                                              <input type="hidden" name="id_producto" id="id_producto" value="'.$id_producto.'"/>
                                              <input type="hidden" name="producto" id="producto" value="'.$producto.'"/>
                                              <input type="hidden" name="ticket" id="ticket" value="'.$id_ticket.'"/>
                                                  ';

                                             ?>

                                    <div class="form-group">
                                        <label class="control-label col-xs-4" for="last-name">Descripcion Producto <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-6 col-xs-12">                                   
                                         <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                          
                                          </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-xs-4" for="last-name">Descripcion Solucion <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-6 col-xs-12">                                   
                                         <textarea name="trabajo" id="trabajo" class="form-control"></textarea>  
                          
                                          </div>
                                    </div>
                                        
                                           
                                  </div>
                              </div>
                             </div>  
                             <div class="row"> 
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-9">
                                    <div class="row">
                                        <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipo se entrega<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="equipo_queda" name="equipo_queda" class="form-control ">
                                              <option value="Iniciado">Reparado</option>
                                              <option value="EnProceso">En espera</option>
                                              <option value="Finalizado">Finalizado</option>                                    
                                            </select>
                                          </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Descripcion Falla <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-6 col-xs-12">                                   
                                         <textarea name="falla" id="falla" class="form-control"></textarea>  
                          
                                          </div>
                                       
                                    </div>
                                    </div>
                                  </div>
                                <div class="col-lg-9">
                                  <div class="row">
                                 
                                  
                                     <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Firma Cliente<span class="required"></span>
                                    </label>
                                    <br> <br> <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <canvas id='canvasCliente' width="300" height="100" style='border: 1px solid #CCC;'>
                                              <p>Tu navegador no soporta canvas</p>
                                          </canvas>

                                      <input type='hidden' name='imagenC' id='imagenC' />

                                    <button class="btn btn-warning" type='button' onclick='LimpiarTrazado()'>Borrar</button>
                                   </div>
                                    </div> <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Firma tecnico<span class="required"></span>
                                    </label>
                                    <br> <br> <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <canvas id='canvas2' width="300" height="100" style='border: 1px solid #CCC;'>
                                              <p>Tu navegador no soporta canvas</p>
                                          </canvas>

                                      <input type='hidden' name='imagen2' id='imagen2' />

                                    <button class="btn btn-warning" type='button' onclick='LimpiarTrazado2()'>Borrar</button>
                                   </div>
                                    </div>
                                    <input type="hidden" name="bandera" id="bandera" value="ticket"/>
                                    
                                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" onclick="GuardarTrazado()" class="btn btn-success">Ingresar</button>
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
          var bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/modiContacto.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          bandera:bandera},  
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
          var producto = $(this).attr("producto");
          var codigo_serie = $(this).attr("codigo_serie"); 
          var id_producto = $(this).attr("id_producto"); 
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/nuevoC1.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,
                          employee_name:employee_name,
                          bandera:bandera,
                          producto:producto,
                          codigo_serie:codigo_serie,
                          id_producto:id_producto},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
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
        MouseMove(touch);
      }
    }

    function TouchStart2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd2(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
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
        
    </body>
</html>