
<?php 
$codigo=$_POST["employee_id"];
$empresa=$_POST["employee_name"];
echo '

                                         <div class="col-xs-8"><h3>Empresa:<strong> '.$empresa.'</strong></h3></div>

';
 ?>
<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/TicketControlador.php?accion=guardarC">  
                          <br>
                          <br>
                          <br>
                          <br>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Contacto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-xs-6 col-xs-12">
                              <input type="text" id="nombre" name="nombre"  required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <?php 
                            echo '<input type="hidden" id="id_cliente" name="id_cliente" value="'.$codigo.'">
                                  <input type="hidden" id="empresa" name="empresa" value="'.$empresa.'">
                                  ';
                           ?>
                          <div class="form-group">
                                <label class="control-label col-md-3 col-xs-3 col-xs-12" for="first-name">Correo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-xs-6 col-xs-12">
                                  <input type="text" id="correo" name="correo" required="required" class="form-control col-md-3 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-xs-3 col-xs-12" for="first-name">Telefono Contacto <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-xs-6 col-xs-12">
                                  <input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-3 col-xs-6">
                                </div>
                              </div>
                             
                          <div class="form-group">
                            <label class="control-label col-md-3 col-xs-4 col-xs-7" for="first-name">Extension <span class="required">*</span>
                            </label>
                            <div class="col-md-5 col-xs-6 col-xs-12">
                              <input type="text" id="extension" name="extension" required="required" class="form-control col-md-3 col-xs-6">
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="control-label col-md-3 col-xs-3 col-xs-12" for="first-name">Movil <span class="required">*</span>
                            </label>
                            <div class="col-md-5 col-xs-6 col-xs-12">
                              <input type="text" id="movil" name="movil" required="required" class="form-control col-md-3 col-xs-6">
                            </div>
                          </div> 
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />
                              <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">     
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                                  </div>
                             </div>
                     </form>  