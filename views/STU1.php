  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario Responsable <span class="required">*</span>
                                        </label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select  id="id_usuario" name="id_usuario" class="form-control ">
                                             <?php
                                             $codigo = $_POST['cod_banda'];
                                             $id_usuario = $_POST['usuario'];
                                             require_once "../class/Usuario.php";
                                                 $usua = new Usuario();
                                                 $usuar=$usua->selectTecnicos($codigo);
                                                 $dusuar=$usua->selectDTecnicos($id_usuario);
                                            foreach ((array)$usuar as $w) {
                                               echo '
                                                <option value="'.$w["id_usuario"].'">'.$w["nombre"].' '.$w["apellido"].'</option>
                                               ';
                                             }
                                             foreach ((array)$dusuar as $e) {
                                               echo '
                                                <option value="'.$e["id_usuario"].'">'.$e["nombre"].' '.$e["apellido"].'</option>
                                               ';
                                             }
                                           
                                           
                                               ?>
                                              
 </select>
</div>