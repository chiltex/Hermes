  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo Gestion <span class="required">*</span>
                                        </label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select  id="id_usuario" name="id_usuario" class="form-control ">
                                             <?php
                                             $codigo = $_POST['cod_banda'];
                                             require_once "../class/Usuario.php";
                                                 $usua = new TipoGestion();
                                                 $usuar=$usua->selectALLTG($codigo);
                                            foreach ((array)$usuar as $w) {
                                               echo '
                                                <option value="'.$w["id_tipo_gestion"].'">'.$w["nombre"].'</option>
                                               ';
                                             }
                                           
                                           
                                               ?>
                                              
 </select>
</div>