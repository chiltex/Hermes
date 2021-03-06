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
                        <h2>Agregar cliente</h2>
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
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/FormularioRetornoControlador.php?accion=modificar" method="post">
                      <div class="row">
                          <?php 
                                  $id_form_retorno=$_GET["id"];
                           require_once "../class/FormularioRetorno.php";
                               $miFichaT = new FormularioRetorno();
                               $ft = $miFichaT->selectALLONE($id_form_retorno);
                               foreach ($ft as $key) {
                               ?>
                          <div class="col-xs-12">
                              <div class="col-xs-8 col-sm-6">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <?php 
                                          echo '
                                        <input type="date" name="fecha" id="fecha" value="'.$key['fecha'].'" class="form-control" />';
                                         ?>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sales Order <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php  
                                  echo '<input type="text" id="sales_order" name="sales_order" value="'.$key['sales_order'].'" class="form-control col-md-7 col-xs-12">

                                            <input type="hidden" name="id_form_retorno" id="id_form_retorno" value="'.$id_form_retorno.'"/>
                                  ';
                                  ?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PO # <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                  echo '  <input type="text" id="PO" name="PO" value="'.$key['PO'].'" class="form-control col-md-7 col-xs-12">';
                                   ?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ship Method Via <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                  echo '
                                    <input type="text" id="ship_method_via" name="ship_method_via" value="'.$key['ship_method_via'].'" class="form-control col-md-7 col-xs-12"';
                                   ?>>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Phone <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                  echo '  <input type="text" id="customer_phone" name="customer_phone" value="'.$key['customer_phone'].'" class="form-control col-md-7 col-xs-12">';
                                   ?>
                                  
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Fax <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                  echo '<input type="text" id="customer_fax" name="customer_fax" value="'.$key['customer_fax'].'" class="form-control col-md-7 col-xs-12">';
                                   ?>
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City/ state <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                    echo ' <input type="text" id="city" name="city" value="'.$key['city'].'" class="form-control col-md-7 col-xs-12">';
                                   ?>
                                   
                                  </div>
                                </div>
                              </div>
                              <!--end part left-->
                               <div class="col-xs-8 col-sm-6">
                                   <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> <span class="required"></span>
                                    </label>
                                    <div class="col-md-10 col-sm-3 col-xs-12">
                                        <?php 
                                          if ($key['warranty_status']=="Warranty Failure") {
                                            echo ' <input type="radio" name="warranty_status" id="warranty_status" checked value="Warranty Failure" /><strong> Warranty Failure</strong><br>
                                               <input type="radio" name="warranty_status" id="warranty_status" value="Non Warranty" /><strong> Non Warranty </strong><br>
                                                <input type="radio" name="warranty_status" id="warranty_status" value="Out of Box Failure" /><strong> Out of Box Failure </strong><h7>(Within 30 days of installation)</h7><br>
                                              ';
                                          }elseif ($key['warranty_status']=="Non Warranty") {
                                           echo ' <input type="radio" name="warranty_status" id="warranty_status" value="Warranty Failure" /><strong> Warranty Failure</strong><br>
                                               <input type="radio" name="warranty_status" id="warranty_status" checked value="Non Warranty" /><strong> Non Warranty </strong><br>
                                                <input type="radio" name="warranty_status" id="warranty_status" value="Out of Box Failure" /><strong> Out of Box Failure </strong><h7>(Within 30 days of installation)</h7><br>
                                              ';
                                          }
                                          elseif ($key['warranty_status']=="Out of Box Failure") {
                                           echo ' <input type="radio" name="warranty_status" id="warranty_status" value="Warranty Failure" /><strong> Warranty Failure</strong><br>
                                               <input type="radio" name="warranty_status" id="warranty_status"  value="Non Warranty" /><strong> Non Warranty </strong><br>
                                                <input type="radio" name="warranty_status" id="warranty_status" checked value="Out of Box Failure" /><strong> Out of Box Failure </strong><h7>(Within 30 days of installation)</h7><br>
                                              ';
                                          }
                                          else{
                                             echo ' <input type="radio" name="warranty_status" id="warranty_status" value="Warranty Failure" /><strong> Warranty Failure</strong><br>
                                               <input type="radio" name="warranty_status" id="warranty_status"  value="Non Warranty" /><strong> Non Warranty </strong><br>
                                                <input type="radio" name="warranty_status" id="warranty_status"  value="Out of Box Failure" /><strong> Out of Box Failure </strong><h7>(Within 30 days of installation)</h7><br>
                                              ';

                                          }


                                         ?>
                                         </div>
                                          
                                  </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cliente Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php 
                                      echo '<input type="text" id="cliente_nombre" name="cliente_nombre" value="'.$key['cliente_nombre'].'" class="form-control col-md-7 col-xs-12">';
                                     ?>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cliente Phone<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php 
                                    echo '<input type="text" id="cliente_phone" name="cliente_phone" value="'.$key['cliente_phone'].'" class="form-control col-md-7 col-xs-12">';
                                     ?>
                                      
                                    </div>
                                  </div>
                                      <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> <span class="required"></span>
                                    </label>
                                    <div class="col-md-10 col-sm-3 col-xs-12">
                                        <?php 
                                          if ($key['accion']=="Returbish/Exchange") {
                                            echo '  <input type="radio" name="accion" id="warranty_status" checked value="Returbish/Exchange" /><strong> Returbish/Exchange</strong><br>
                                               <input type="radio" name="accion" id="warranty_status" value="Haber" /><strong> Haber</strong><h7>(Restock fee 30% Equipment 20% Parts and supplies)</h7><br>
                                                <input type="radio" name="accion" id="warranty_status" value="Out of Box Failure" /><strong> Customer Repair Return </strong><h7>(Customer Owned)</h7><br>
                                                ';
                                          }
                                          elseif ($key['accion']=="Haber") {
                                            echo '  <input type="radio" name="accion" id="warranty_status" value="Returbish/Exchange" /><strong> Returbish/Exchange</strong><br>
                                               <input type="radio" name="accion" id="warranty_status" checked value="Haber" /><strong> Haber</strong><h7>(Restock fee 30% Equipment 20% Parts and supplies)</h7><br>
                                                <input type="radio" name="accion" id="warranty_status" value="Out of Box Failure" /><strong> Customer Repair Return </strong><h7>(Customer Owned)</h7><br>
                                                ';
                                          } elseif ($key['accion']=="Out of Box Failure") {
                                            echo '  <input type="radio" name="accion" id="warranty_status" value="Returbish/Exchange" /><strong> Returbish/Exchange</strong><br>
                                               <input type="radio" name="accion" id="warranty_status"  value="Haber" /><strong> Haber</strong><h7>(Restock fee 30% Equipment 20% Parts and supplies)</h7><br>
                                                <input type="radio" name="accion" id="warranty_status" checked value="Out of Box Failure" /><strong> Customer Repair Return </strong><h7>(Customer Owned)</h7><br>
                                                ';
                                          }
                                          else{
                                            echo '
                                              <input type="radio" name="accion" id="warranty_status" value="Returbish/Exchange" /><strong> Returbish/Exchange</strong><br>
                                               <input type="radio" name="accion" id="warranty_status" value="Haber" /><strong> Haber</strong><h7>(Restock fee 30% Equipment 20% Parts and supplies)</h7><br>
                                                <input type="radio" name="accion" id="warranty_status" value="Out of Box Failure" /><strong> Customer Repair Return </strong><h7>(Customer Owned)</h7><br>
                                            ';
                                          }

                                         ?></div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Bill To <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php 
                                    echo '<input type="text" id="bill_to" name="bill_to" value="'.$key['bill_to'].'" class="form-control col-md-7 col-xs-12">';
                                     ?>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Ship to <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php 
                                      echo '<input type="text" id="ship_to" name="ship_to" value="'.$key['ship_to'].'" class="form-control col-md-7 col-xs-12">';
                                     ?>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Customer Address <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php 
                                  echo '<input type="text" id="customer_address" name="customer_address" value="'.$key['customer_address'].'" class="form-control col-md-7 col-xs-12">';
                                   ?>
                                    
                                  </div>
                                </div>

                              </div> 
                                <!--end part rigth-->
                          </div><!--end COL md-12-->
                          <div class="col-xs-12">
                            <h2>Detalle Retorno</h2>
                                 
                            <button type="button" id="bt_add_detalle" class="btn btn-primary">Agregar</button>
                             <input type="button" name="accion" value="List Part Failures" id="accion" class="btn btn-success views_data1" /> 
                            <table id="datatable-buttons2" class="table table-striped table-bordered">
                               <thead>
                                        <tr>
                                          <th>Part Number Description </th>
                                          <th>Marsh Authorization</th>
                                          <th>Equipment Serial</th>                      
                                          <th>Serial</th>
                                          <th>Cantidad</th>                        
                                          <th>Part Fail</th>                      
                                          <th>Invoice</th> 

                                        </tr>
                               </thead>
                                <tbody>
                                <?php 
                                    require_once "../class/DetalleRetorno.php";
                                         $repuesto = new DetalleRetorno();
                                         $DetalleRetorno = $repuesto->selectOne($id_form_retorno);
                                         foreach ($DetalleRetorno as $field) {
                                         echo '
                                         <tr>
                                         <th><input type="text" name="part_number_description[]" value="'.$field['part_number_description'].'" class="form-control" /></th>
                                         <th><input type="text" name="marsh_authorization_level[]" value="'.$field['marsh_authotization_level'].'" class="form-control" /></th>
                                         <th><input type="text" name="equipment_serial_number[]" value="'.$field['equipment_serial_number'].'" class="form-control" /></th>
                                         <th><input type="text" name="codigo_serie[]" value="'.$field['codigo_serie'].'" class="form-control" /></th>
                                         <th><input type="text" name="cantidad[]" value="'.$field['cantidad'].'" class="form-control" /></th>
                                         <th><strong>P</strong><input type="text" name="id_part_fail[]" value="'.$field['id_part_fail'].'" class="form-control" /></th>
                                         <th><input type="text" name="invoice[]" value="'.$field['invoice'].'" class="form-control" />
                                            <input type="hidden" name="id_form_dr[]" id="id_form_dr[]" value="'.$field['id_form_retorno'].'"/>
                                            <input type="hidden" name="id[]" id="id[]" value="'.$field['id_detalle_retorno'].'"/>
                                         </th>
                                         <th>

                                    <a href="../controller/FormularioRetornoControlador.php?id='.$field["id_detalle_retorno"].'&accion=eliminarDR&id_form_retorno='.$field['id_form_retorno'].'" class="btn btn-danger">X</a>
                                         </th>
                                          </tr>

                                         ';
                                         }

                                 ?>
                                  
                                </tbody>
                                <tfoot>
                                  
                                </tfoot>
                              
                                
                            </table>
                          </div>
                          <!--end COL md-12-->






                          <br>
                          <div class="col-xs-12">
                            <div class="col-xs-12 col-sm-3">
                              <?php 
                                if ($key['aplicacion']=="alpha-numeric") {
                               echo '<strong><h5>Aplication</h5></strong><br>
                                               <input type="radio" name="aplicacion" checked id="aplicacion" value="alpha-numeric" /><strong> Alpha-numeric</strong><br>
                                                <input type="radio" name="aplicacion" id="aplicacion" value="logo" /><strong> Logo </strong><br>
                                   ';
                                }elseif ($key['aplicacion']=="logo") {
                               echo '<strong><h5>Aplication</h5></strong><br>
                                               <input type="radio" name="aplicacion" id="aplicacion" value="alpha-numeric" /><strong> Alpha-numeric</strong><br>
                                                <input type="radio" name="aplicacion" id="aplicacion" checked value="logo" /><strong> Logo </strong><br>
                                   ';
                                }
                                else{

                                  echo '<strong><h5>Aplication</h5></strong><br>
                                               <input type="radio" name="aplicacion" id="aplicacion" value="alpha-numeric" /><strong> Alpha-numeric</strong><br>
                                                <input type="radio" name="aplicacion" id="aplicacion" value="logo" /><strong> Logo </strong><br>';
                                }

                               ?>
                                    
                            </div>
                             <div class="col-xs-12 col-sm-3">
                             <?php 
                              if ($key['enviroment']=="Textile") {
                                echo '
                                              <strong><h5>Plant Type</h5></strong><br>
                                              <input type="radio" name="enviroment" id="enviroment" checked value="Textile" /><strong> Textile</strong><br>
                                               <input type="radio" name="enviroment" id="enviroment" value="Food" /><strong> Food</strong><br>
                                                <input type="radio" name="enviroment" id="enviroment" value="Industrial" /><strong> Industrial </strong><br>
                            ';
                               
                              }elseif ($key['enviroment']=="Food") {
                                echo '
                                              <strong><h5>Plant Type</h5></strong><br>
                                              <input type="radio" name="enviroment" id="enviroment" value="Textile" /><strong> Textile</strong><br>
                                               <input type="radio" name="enviroment" id="enviroment" checked  value="Food" /><strong> Food</strong><br>
                                                <input type="radio" name="enviroment" id="enviroment" value="Industrial" /><strong> Industrial </strong><br>
                            ';
                               
                              }elseif ($key['enviroment']=="Industrial") {
                                echo '
                                              <strong><h5>Plant Type</h5></strong><br>
                                              <input type="radio" name="enviroment" id="enviroment" value="Textile" /><strong> Textile</strong><br>
                                               <input type="radio" name="enviroment" id="enviroment" value="Food" /><strong> Food</strong><br>
                                                <input type="radio" name="enviroment" id="enviroment" checked value="Industrial" /><strong> Industrial </strong><br>
                            ';
                               
                              }else
                              {
                                echo '<strong><h5>Plant Type</h5></strong><br>
                                              <input type="radio" name="enviroment" id="enviroment" value="Textile" /><strong> Textile</strong><br>
                                               <input type="radio" name="enviroment" id="enviroment" value="Food" /><strong> Food</strong><br>
                                                <input type="radio" name="enviroment" id="enviroment" value="Industrial" /><strong> Industrial </strong><br>
                            ';
                              }
                              ?>
                             </div>
                            <div class="col-xs-12 col-sm-3">
                            <?php 
                              if ($key['operating_conditions']=="Humid") {
                               echo '
                                                 <strong><h5>Operating Condition</h5></strong><br>
                                              <input type="radio" name="operating_conditions" id="operating_conditions" checked value="Humid" /><strong> Humid</strong><br>
                                               <input type="radio" name="operating_conditions" id="operating_conditions" value="Dry" /><strong> Dry </strong><br>
                                                <input type="radio" name="operating_conditions" id="operating_conditions" value="Wash Down" /><strong> Wash Down </strong><br>
                           ';
                              }elseif ($key['operating_conditions']=="Dry") {
                               echo '
                                                 <strong><h5>Operating Condition</h5></strong><br>
                                              <input type="radio" name="operating_conditions" id="operating_conditions" value="Humid" /><strong> Humid</strong><br>
                                               <input type="radio" name="operating_conditions" id="operating_conditions" checked value="Dry" /><strong> Dry </strong><br>
                                                <input type="radio" name="operating_conditions" id="operating_conditions" value="Wash Down" /><strong> Wash Down </strong><br>
                           ';
                              }elseif ($key['operating_conditions']=="Wash Down") {
                               echo '
                                                 <strong><h5>Operating Condition</h5></strong><br>
                                              <input type="radio" name="operating_conditions" id="operating_conditions" value="Humid" /><strong> Humid</strong><br>
                                               <input type="radio" name="operating_conditions" id="operating_conditions" value="Dry" /><strong> Dry </strong><br>
                                                <input type="radio" name="operating_conditions" id="operating_conditions" checked value="Wash Down" /><strong> Wash Down </strong><br>
                           ';
                              }else{
                                echo '
                                                 <strong><h5>Operating Condition</h5></strong><br>
                                              <input type="radio" name="operating_conditions" id="operating_conditions" value="Humid" /><strong> Humid</strong><br>
                                               <input type="radio" name="operating_conditions" id="operating_conditions" value="Dry" /><strong> Dry </strong><br>
                                                <input type="radio" name="operating_conditions" id="operating_conditions" value="Wash Down" /><strong> Wash Down </strong><br>
                            ';
                              }
                             ?>
                             </div>
                             <div class="col-xs-12 col-sm-3">
                             <?php  
                           if ($key['temperature']=="Hot") {
                               echo '   <strong><h5>Temperature</h5></strong><br>
                                              <input type="radio" name="temperature" id="temperature" checked value="Hot" /><strong> Hot</strong><br>
                                               <input type="radio" name="temperature" id="temperature" value="Cold" /><strong> Cold</strong><br>
                            ';
                           }elseif ($key['temperature']=="Cold") {
                               echo '   <strong><h5>Temperature</h5></strong><br>
                                              <input type="radio" name="temperature" id="temperature" value="Hot" /><strong> Hot</strong><br>
                                               <input type="radio" name="temperature" id="temperature" checked value="Cold" /><strong> Cold</strong><br>
                            ';
                           }else{
                            echo '

                                               <strong><h5>Temperature</h5></strong><br>
                                              <input type="radio" name="temperature" id="temperature" value="Hot" /><strong> Hot</strong><br>
                                               <input type="radio" name="temperature" id="temperature" value="Cold" /><strong> Cold</strong><br>
                            ';

                           }
                         ?>
                         </div>

                          </div>
                          <br>
                          <br>
                          <div class="col-xs-12">
                            <div class="col-xs-4">
                              <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Comentario<span class="required">*</span>
                                  </label>
                                  <div class="col-md-10 col-sm-6 col-xs-12">
                                    <textarea id="comentario" name="comentario" class="form-control col-md-7 col-xs-12"><?php 
                                      echo $key['comentarios']; 
                                      ?>
                                    </textarea>
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                              <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Estado<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select id="estado" name="estado" class="form-control ">
                                     <?php 
                                      if ($key['estado']=="Iniciado") {
                                       echo '

                                              <option value="Iniciado">Iniciado</option>
                                              <option value="Aprobado">Aprobado</option>
                                              <option value="Rechazado">Rechazado</option> 
                                       ';
                                      } elseif ($key['estado']=="Aprobado") {
                                       echo '
                                              
                                              <option value="Aprobado">Aprobado</option>
                                              <option value="Iniciado">Iniciado</option>
                                              <option value="Rechazado">Rechazado</option> 
                                       ';
                                      } elseif ($key['estado']=="Rechazado") {
                                       echo '
                                              
                                              <option value="Rechazado">Rechazado</option> 
                                              <option value="Aprobado">Aprobado</option>
                                              <option value="Iniciado">Iniciado</option>
                                       ';
                                      }

                                      ?>                                   
                                            </select>
                                  </div>
                                </div> 

                            </div>  
                                    

                          </div>
                       </div>
                        <?php 
                            }
                         ?>
                        <!--end row-->
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                      </form>

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
                                                 <h4 class="modal-title">List Part Fail</h4>  
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
     
      
      <script>
          $(document).on('click', '.views_data1', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listPartFail.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });  

      $(document).ready(function(){
      $('#bt_add_detalle').click(function(){
        agregar_detalle();
      });
    });
      function agregar_detalle(){
    
        fila_taller='<tr><th><input type="text" name="part_number_description[]" class="form-control"/></th><th><input type="text" name="marsh_authorization_level[]" class="form-control" /></th><th><input type="text" name="equipment_serial_number[]" class="form-control" /></th><th><input type="text" name="codigo_serie[]" class="form-control" /></th><th><input type="text" name="cantidad[]" class="form-control" /></th><th><strong>P</strong><input type="text" name="id_part_fail[]" class="form-control" /></th><th><input type="text" name="invoice[]" class="form-control" /><input type="hidden" name="id_form_dr[]" id="id_form_dr" value="0"/></th></tr>';
     
        $("#datatable-buttons2").append(fila_taller);
      
      
    }
      </script>

        
    </body>
</html>