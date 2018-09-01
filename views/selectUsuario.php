<?php 
  require_once "../class/Usuario.php";
  						 $codigo=$_POST["employee_id"];
                         $miUsuario = new Usuario();
                         $usuario = $miUsuario->selectOne($codigo);

                    foreach ($usuario as $key) {
                    	echo'
                    	 <div class="table-responsive">  
          				 <table class="table table-bordered">
          				 '; 
                   echo '
                          <tr>
                           <td>Nombres: </td>
                           <td>'.$key['nombre'].'</td>
                          </tr>
                           <tr>
                           <td>Apellidos: </td>
                           <td>'.$key["apellido"].'</td>
                           </tr>
                           <tr>
                           <td>Tipo Cliente: </td>
                           <td>';
                   $tipo_usuario=$miUsuario->selectOneTC($key['id_tipo_usuario']);
          				  foreach ($tipo_usuario as $rew) {
                             echo ''.$rew['nombre'].'';
                           }
                           echo '</td></tr>
                            <tr>
                           <td>Correo: </td>
                           <td>'.$key["correo"].'</td>
                           </tr>
						 </table>
          				 </div>
          				 ';
                	
                    
                }
?>