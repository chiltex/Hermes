<?php
require_once "../class/Consumibles.php";

							$codigo=$_POST["employee_id"]; 
              $miConsumible = new Consumibles();
                         $Consumible= $miConsumible->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$Consumible as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_Consumible'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                          <td>Descripcion: </td>
                          <td>'.$row['descripcion'].'</td>
                        </tr>
                        <tr>
                        	<td> codigo Serie: </td>
                           <td>'.$row["codigo_serie"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_consumible'].'"/>  
                                                  
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