<?php
require_once "../class/Productos.php";

							$codigo=$_POST["employee_id"];
					     $miProducto = new Productos();
                         $producto = $miProducto->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$producto as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_producto'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>';

                        $grupo_producto=$miProducto->selectOneGP($row['id_grupo_producto']);
                           foreach ($grupo_producto as $rew) {
                             echo ''.$rew['nombre'].'';
                           }
                           echo'
                        </tr>
                        <tr>
                        	<td> codigo Serie: </td>
                           <td>'.$row["codigo_serie"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_producto'].'"/>  
                                                  
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