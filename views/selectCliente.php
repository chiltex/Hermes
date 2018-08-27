<?php 
  require_once "../class/Cliente.php";
  						 $codigo=$_POST["employee_id"];
                         $misClientes = new Cliente();
                         $cliente = $misClientes->selectOne($codigo);

                    foreach ($cliente as $key) {
                    	echo'
                    	 <div class="table-responsive">  
          				 <table class="table table-bordered">
          				 ';
          				  foreach ((array)$cliente as $row) {
                          $tipo_cliente=$misClientes->selectOneTC($row['id_tip_cli']);
                          $categoria=$misClientes->selectOneCat($row['id_categoria']);
                         echo '
                          <tr>
                           <td>Nombre: </td>
                           <td>'.$row['nombre'].'</td>
                          </tr>
                          <tr>
                           ';

                            foreach ($categoria as $key) {
                              echo '
                              <td>Categoria: </td>
                              <td>'.$key['nombre'].'</td>
                          </tr>';
                            }
                            
                           echo '
                           <tr>
                           <td>Direccion: </td>
                           <td>'.$row["direccion"].'</td>
                           </tr>
                           <tr>
                           <td>Tipo Cliente: </td>
                           <td>';
                           foreach ($tipo_cliente as $rew) {
                             echo ''.$rew['tipo_cliente'].'';
                           }
                           echo '</td></tr>
						 </table>
          				 </div>
          				 ';
                	
                    }
                }
?>