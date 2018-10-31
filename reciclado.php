
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/ClienteControlador.php?accion=guardar" method="post">
          
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre cliente <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo Cliente <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    <select  id="id_tip_cli" name="id_tip_cli" class="form-control ">
                                       <?php 
                               require_once "../class/Cliente.php";
                               $misTC = new Cliente();
                               $tc = $misTC->selectAllTipCliente();
                              
                                 # code...
                               
                               foreach ((array)$tc as $row) {
                               echo '
                                <option value="'.$row["id_tip_cli"].'">'.$row["tipo_cliente"].'</option>
                               ';
                                     }
                                   
                                   
                                       ?>
                                                
                                            </select>
                                          </div>
                                        </div>                          
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Categoria Cliente <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                              <select  id="id_categoria" name="id_categoria" class="form-control ">
                                                 <?php 
                                       require_once "../class/Categorias.php";
                                       $misCategorias = new Categorias();
                                       $catego = $misCategorias->selectALL();
                                      
                                         # code...
                                       
                                       foreach ((array)$catego as $row) {
                                       echo '
                                        <option value="'.$row["id_categoria"].'">'.$row["nombre"].'</option>
                                       ';
                                     }
                                   
                                   
                                       ?>
                                                  
                                              </select>
                                            </div>
                                          </div>
                                          
                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección cliente <span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                              </div>
                                            </div>
                                        
                                        
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                                            <button type="submit" class="btn btn-success">Ingresar</button>
                                          </div>
                                        </div>
          
                            </form>