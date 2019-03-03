<form id="insert_form" data-parsley-validate class="form-horizontal form-label-left" action="../controller/TicketControlador.php?accion=guardarPC" method="post">
                  <?php 
                  $id_cliente = $_POST['employee_id'];
                  $empresa = $_POST['employee_empresa'];

                 // $badnera = $_POST['bandera'];
                  echo '
                              <input type="hidden" id="id_cliente" name="id_cliente" value="'.$id_cliente.'">
                              <input type="hidden" id="empresa" name="empresa" value="'.$empresa.'">';
                   ?>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Producto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Grupo Producto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select  id="id_grupo_producto" name="id_grupo_producto" class="form-control ">
                                 <?php 
                         require_once "../class/GrupoProducto.php";
                         $misGP = new GrupoProducto();
                         $tc = $misGP->selectAll();
                        
                           # code...
                         
                         foreach ((array)$tc as $row) {
                         echo '
                          <option value="'.$row["id_grupo_producto"].'">'.$row["nombre"].'</option>
                         ';
                       }
                     
                     
                         ?>
                                  
                              </select>
                            </div>
                          </div>                          
                                                    
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo Serie <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="codigo_serie" name="codigo_serie" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                          
                          
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                          </div>
</form>