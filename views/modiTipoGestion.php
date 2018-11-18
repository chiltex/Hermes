   <form role="form" action="../controller/TipoGestionControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/TipoGestion.php";


         
							$codigo=$_POST["employee_id"];
					     $misTGestions = new TipoGestion();
                         $catego = $misTGestions->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Nombre</label>
                  <input type="text" class="form-control" value="'.$row["nombre"].'" id="nombre" name="nombre">
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Descripcion</label>
                  <input type="text" class="form-control" required="" value="'.$row["descripcion"].'" id="descripcion" name="descripcion" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label >Gestion<span class="required">*</span>
                                      </label>
                                      

                                        <select id="id_gestion" name="id_gestion" class="form-control "> ';
                                       
                                     
                                         require_once "../class/Gestion.php";
                                             $gestion = new Gestion();
                                             $ges=$gestion->selectALL();
                                          
                                             # code...
                                           
                                           foreach ((array)$ges as $raw) {
                                            if ($raw['id_gestion']==$row['id_gestion']) {
                                               echo '
                                            <option value="'.$raw["id_gestion"].'" selected>'.$raw["nombre"].'</option>
                                           ';

                                            }
                                            else{

                                           echo '
                                            <option value="'.$raw["id_gestion"].'">'.$raw["nombre"].'</option>
                                           ';
                                            }

                                         }
                                       
                                       
                                                                      
                                       

                         }


 ?> </div></select>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/TipoGestion.php'" name="cancel" value="Cancelar" >
              </div>
            </form>