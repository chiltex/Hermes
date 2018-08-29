<?php
require_once "../class/GrupoProducto.php";

							$codigo=$_POST["employee_id"];
					     $misGrupo = new GrupoProducto();
                         $catego = $misGrupo->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_grupo_producto'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        	<td> descripcion: </td>
                           <td>'.$row["descripcion"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_grupo_producto'].'"/>  
                                                  
                        </tr>
                        <tr>
                          <td> Estado: </td>
                           <td>'.$row["estado"].'</td>
                                                  
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>