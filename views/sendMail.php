<form id="insert_form" data-parsley-validate class="form-horizontal form-label-left" action="../controller/pdf.php?accion=enviar" method="post">
    <?php 
      require_once "../class/FichaTenica.php";
                                  $codigo=$_POST["employee_id"];
                         $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);
                         foreach ($ft as $key ) {
                              $id_contacto = $key['id_contacto'];
                         }
                         require_once "../class/Contactos.php";

            
               $miContacto = new Contactos();
                         $contac = $miContacto->selectOne($id_contacto);
                        
                           # code...
                         
                         foreach ((array)$contac as $row) {

                                  ?>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Contacto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php 
                              echo '<input type="text" id="nombre" name="nombre" required="required" readonly="true" value="'.$row['nombre'].'" class="form-control col-md-7 col-xs-12">
                              ';
                               ?>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo de Contacto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php 
                              echo '<input type="text" id="destino" name="destino" required="required"  value="'.$row['correo'].'" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" name="id_ft" id="id_ft" value="'.$codigo.'"/>  
                              ';
                               ?></div>
                          </div>
                          <?php 
                           
                          } ?>

                                                    
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Enviar Copia a jefe: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select  id="id_tipo_usuario" name="id_tipo_usuario" class="form-control ">
                                 <?php 
                         require_once "../class/Usuario.php";
                         $misTU = new Usuario();
                         $tc = $misTU->selectAllJ();
                        
                           # code...
                         
                         foreach ((array)$tc as $row) {
                         echo '
                          <option value="'.$row["correo"].'">'.$row["correo"].'</option>
                         ';
                       }
                     
                     
                         ?>
                                  
                              </select>
                               </div>
                              </div>
                          
                          
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                          </div>
</form>