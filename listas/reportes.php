<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
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

    <title>HERMES| REPORTES</title>

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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <!--  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">-->

    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
     <!-- SELECT WITH SEARCH-->
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

   <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
body{
  background:#000;
}

section.awSlider .carousel{
  display:table;
  z-index:2;
  -moz-box-shadow: 0 0 4px #444;
  -webkit-box-shadow: 0 0 4px #444;
  box-shadow: 0 0 15px rgba(1,1,1,.5);
}

section.awSlider{
  margin:30px auto;
  padding:30px;
  position:relative;
  display:table;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

section.awSlider:hover > img{
  -ms-transform: scale(1.2);
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
  opacity:1;
}

section.awSlider img{
   pointer-events: none;
}

section.awSlider > img{
  position:absolute;
  top:30px;
  z-index:1;
  transition:all .3s;
  filter: blur(1.8vw);
  -webkit-filter: blur(2vw);
  -moz-filter: blur(2vw); 
  -o-filter: blur(2vw); 
  -ms-filter: blur(2vw);
  -ms-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
  opacity:.5;
}
    </style>
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
              
        
              

			  
              <div class="col-md-12 col-sm-12 col-xs-12">


                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagina de Reportes</h2>
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
                     <form action="reportes.php" method="POST" class="form-horizontal form-label-right">
                 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Seleccione una opcion<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2> 
                      Buscar por Tecnico: <input type="checkbox" id="myCheck2" name="myCheck2" value="opcion3" onclick="myFunction2()">
                      Buscar por fecha: <input type="checkbox" id="myCheck" name="myCheck" value="opcion1" onclick="myFunction()">
                      Buscar por estado: <input type="checkbox" id="myCheck1"  name="myCheck1" value="opcion2" onclick="myFunction1()"></h2>
                        </div>
                      </div>
                    
                          <div id="tecnico" class="form-group" style="display:none">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Tecnico<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                           <select class="selectpicker form-control" name="id_usuario" id="id_usuario" data-live-search="true" title="-- SELECCIONA UNA OPCION --">
                          <option>Seleccione un usuario para buscar</option>
                        <?php 
                          require_once "../class/Usuario.php";

                          $mistipos = new Usuario();
                         $catego = $mistipos->selectTecnicos(5);
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_usuario']."'>Tec. ".$row['nombre']."".$row['apellido']."</option>";

                          } 

                    
                          ?>
                          </select>
                        </div>
                      </div>

                      <div id="fechai" class="form-group" style="display:none">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha inicial<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name="fecha_inicial" id="fecha_inicial" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                        <div id="fechaf" class="form-group" style="display:none">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha final<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class='input-group date' id='myDatepicker3'>
                            <input type='text' class="form-control" name="fecha_final" id="fecha_final" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                       <div id="estado" style="display:none" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Estado<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select class="form-control" id="estado_con" name="estado_con">
                          <option value="Iniciado">Iniciado</option>
                          <option value="Pendiente de Reparar">Pendiente de Reparar</option>
                          <option value="Finalizado">Finalizado</option>
                          </select>
                        </div>
                      </div>
                      <div class="box-footer">

                        <div class="form-label-right col-md-5 col-sm-5 col-xs-12">
               <center> <input type="submit" class="btn btn-primary" name="submit" value="Consultar" ></center>
                        </div>
                      </div>
                    </form>
                               




          
                    <br>
                    <br>
                
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                      <?php 
                      if (isset($_POST['myCheck2'])) {
                         require_once "../class/Usuario.php";
                         $misUsua = new Usuario();
                         $id_u = $_POST['id_usuario'];
                         $usua=$misUsua->selectOne($id_u);
                         foreach ($usua as $key) {
                           $nombreUsuario = $key['nombre'];
                           $apellidoUsuario= $key['apellido'];
                         }
                        echo '<caption><center><h2>Reporte de datos del Tecnico <strong>'.$nombreUsuario.' '.$apellidoUsuario.'</strong></h2></center></caption>';
                      }elseif (isset($_POST['myCheck'])) {
                        
                           $fecha1=$_POST['fecha_inicial'];
                           $fecha2=$_POST['fecha_final'];
                            echo '<caption><center><h2>Reporte de datos de <strong>'.$fecha1.'</strong> hasta <strong>'.$fecha2.'</strong></h2></center></caption>';
                      }elseif (isset($_POST['myCheck1'])) {
                          $estado = $_POST['estado_con'];
                            echo '<caption><center><h2>Reporte de datos con estado <strong>'.$estado.'</strong></h2></center></caption>';
                      }

                       ?>
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Fecha</th>
                          <th>Cliente</th>
                          <th>Hora I.</th>
                          <th>Hora S.</th>
                          <th>Trabajo</th>
                          <th>Trabajo Realizado</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>Tinta</th>
                          <th>Make Up</th>
                          <th>Horas Bomba</th>
                          <th>Tecnico</th>
                          <th>Contacto</th>
                          <th>Estado</th>                     
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                          <th>N°</th>
                          <th>Fecha</th>
                          <th>Cliente</th>
                          <th>Hora I.</th>
                          <th>Hora S.</th>
                          <th>Trabajo</th>
                          <th>Trabajo Realizado</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>Tinta</th>
                          <th>Make Up</th>
                          <th>Horas Bomba</th>
                          <th>Tecnico</th>
                          <th>Contacto</th>
                          <th>Estado</th>                          
                        </tr>
                      </tfoot>
                      <TBODY>
                         <?php 
                         require_once "../class/FichaTenica.php";
                         $misFT = new FichaTecnica();

                         if (isset($_POST['myCheck2'])) {
                           $tecnico = $_POST['id_usuario']; 
                           $fit = $misFT->selectAll_TECNICO($tecnico);
                         }elseif (isset($_POST['myCheck'])) {
                           $fecha1=$_POST['fecha_inicial'];
                           $fecha2=$_POST['fecha_final'];
                           $fit = $misFT->selectAll_DATES($fecha1,$fecha2);

                         }elseif (isset($_POST['myCheck1'])) {
                           $estado = $_POST['estado_con']; 
                           $fit = $misFT->selectAll_STATUS($estado);
                         }else{
                          $fit=NULL;
                         }                  
                        foreach ((array)$fit as $row) {

                          $cadena = strtotime($row['hora_ingreso']);
                          $cadena = date("H:i", $cadena);
                          $cadena2 = strtotime($row['hora_egreso']);
                          $cadena2 = date("H:i", $cadena2);
                        $hora1 = new DateTime($cadena);//fecha inicial
                          $hora2 = new DateTime($cadena2);//fecha de cierre

                          $intervalo = $hora1->diff($hora2);

                           echo '
                            <tr>
                           <td>'.$row['id_ficha_tecnica'].'</td>
                           <td>'.$row['fecha_creacion'].'</td>
                           <td>'.$row['clie'].'</td>
                           <td>'.$row['hora_ingreso'].'</td>
                           <td>'.$row['hora_egreso'].'</td>
                           <td>'.$intervalo->format('%H:%i:%s').'</td>
                           <td>'.$row['trabajo'].'</td>
                           <td>'.$row['prod'].'</td>
                           <td>'.$row['codigo_serie'].'</td>
                           <td>'.$row['tinta'].'</td>
                           <td>'.$row['make_up'].'</td>
                           <td>'.$row['horas_bomba'].'</td>
                           <td>'.$row['usuario'].'</td>
                           <td>'.$row['contac'].'</td>
                           <td>'.$row['equipo_queda'].'</td>
                           ';
                           
                            echo '
                          </tr>
                         ';
                       }
                     
                     
                         ?>
                      </TBODY>
                    </table>
                       </div>
                    </div>
                  </div> <!--X PANEL-->


                </div>
              </div>
			     <div id="dataModal2" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Detalle Ticket</h4>  
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
                                                 <h4 class="modal-title">Enviar Ficha Tecnica</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms3">  
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

  <!--  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
   
	 <!-- Bootstrap -->
	 <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
   <!-- <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>-->






    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

   <!-- <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>-->
   <!-- <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
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
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable({
          dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ]
      });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[0, "desc"]]
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {

      'order'       : [[0, "desc"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    } );
} );
</script>
<script >
  
  function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var fecha_i = document.getElementById("fechai");
  var fecha_f = document.getElementById("fechaf");
  var checkBox2 = document.getElementById("myCheck1");
  var estado = document.getElementById("estado");
  var checkBox3 = document.getElementById("myCheck2");
  var tecnico = document.getElementById("tecnico");
  if (checkBox.checked == true){
    fecha_i.style.display = "block";
    fecha_f.style.display = "block";
    checkBox2.checked=false;
     estado.style.display = "none";
    checkBox3.checked=false;
     tecnico.style.display = "none";
     
    
  } else {
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
     estado.style.display = "none";
     tecnico.style.display = "none";
     
  }
}function myFunction1() {
  var checkBox = document.getElementById("myCheck");
  var fecha_i = document.getElementById("fechai");
  var fecha_f = document.getElementById("fechaf");
  var checkBox2 = document.getElementById("myCheck1");
  var estado = document.getElementById("estado");
  var checkBox3 = document.getElementById("myCheck2");
  var tecnico = document.getElementById("tecnico");
  

  if(checkBox2.checked == true){
    estado.style.display = "block";
    checkBox.checked=false;
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
    checkBox3.checked=false;
     tecnico.style.display = "none";
    
  } else {
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
     estado.style.display = "none";
     tecnico.style.display = "none";
     
  }
}
  function myFunction2() {
  var checkBox = document.getElementById("myCheck");
  var fecha_i = document.getElementById("fechai");
  var fecha_f = document.getElementById("fechaf");
  var checkBox2 = document.getElementById("myCheck1");
  var estado = document.getElementById("estado");
  var checkBox3 = document.getElementById("myCheck2");
  var tecnico = document.getElementById("tecnico");
  if (checkBox3.checked == true){
    tecnico.style.display = "block";
    checkBox.checked=false;
     estado.style.display = "none"; 
     checkBox2.checked=false;
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
     
    
  } else {
     fecha_ip.style.display = "none";
     fecha_fp.style.display = "none";
     estadop.style.display = "none";
     
     tecnico.style.display = "none";
  }
}
</script>
 <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY.MM.DD'
    });
    
    $('#myDatepicker3').datetimepicker({
          format: 'YYYY-MM-DD'
    });
     $('#myDatepicker33').datetimepicker({
          format: 'YYYY-MM-DD'
    });
      $('#myDatepicker34').datetimepicker({
          format: 'YYYY-MM-DD'
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