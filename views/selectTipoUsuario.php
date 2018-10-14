<?php
require_once "../class/TipoUsuario.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new TipoUsuario();
                         $catego = $misCategorias->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_tipo_usuario'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        	<td> descripcion: </td>
                           <td>'.$row["descripcion"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_tipo_usuario'].'"/>  
                                                  
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>