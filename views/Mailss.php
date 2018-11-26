 

  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo de Contacto <span class="required">*</span>
                            </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php 
                                $codigo = $_POST['cod_banda'];
                                 require_once "../class/Usuario.php";
                         $misTU = new Usuario();
                         $tc = $misTU->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$tc as $row) {
                         echo '<input type="text" id="cc" name="cc" required="required"  value="'.$row['correo'].'" class="form-control col-md-7 col-xs-12">
                                
                              ';
                     }

                              
  ?></div>
                         

