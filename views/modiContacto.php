<form role="form" action="../controller/ContactoControlador.php?accion=modificar" method="post"  data-parsley-validate class="form-horizontal form-label-left">
              <div class="box-body">
<?php 
require_once "../class/Contactos.php";


         
					$codigo=$_POST["employee_id"];
               $miContacto = new Contactos();
                         $contac = $miContacto->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$contac as $row) {
                         		echo '
                
                                
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Contacto <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nombre" name="nombre" value="'.$row["nombre"].'"  required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                        
                          <input type="hidden" id="id_cliente" name="id_cliente" value="'.$row["id_cliente"].'">

                          <input type="hidden" id="id_contacto" name="id_contacto" value="'.$codigo.'">
                            
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="correo" name="correo" required="required" value="'.$row["correo"].'" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            
                              
                    

                       
                           
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono Contacto <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="telefono" name="telefono" value="'.$row["telefono"].'" required="required" class="form-control col-md-3 col-xs-6">
                                </div>
                              </div>
                          
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Extension <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="extension" name="extension" value="'.$row["extension"].'" required="required" class="form-control col-md-3 col-xs-6">
                            </div>
                          </div>
                          
                         
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Movil <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="movil" name="movil" required="required" value="'.$row["movil"].'" class="form-control col-md-3 col-xs-6">
                            </div>
                          </div>
                        
                        

                          ';
                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/contactos.php?id=''&nombre=Seleccione un Cliente" name="cancel" value="Cancelar" >
              </div>
            </form>