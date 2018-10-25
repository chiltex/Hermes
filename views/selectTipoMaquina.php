<?php
require_once "../class/TipoMaquina.php";

							$codigo=$_POST["employee_id"];
					     $misTipoMaquina = new TipoMaquina();
                         $catego = $misTipoMaquina->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_tipo_ma'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        	<td> descripcion: </td>
                           <td>'.$row["descripcion"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_tipo_ma'].'"/>  
                                                  
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>