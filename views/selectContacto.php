<?php
require_once "../class/Contactos.php";

							$codigo=$_POST["employee_id"];
					     $miContacto = new Contactos();
                         $contac = $miContacto->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$contac as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_contacto'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        <td>Correo:</td>
                        <td>'.$row['correo'].'</td>
                        </tr>
                        <tr>
                        <td>Telefono:</td>
                        <td>'.$row['telefono'].'
                        Extension: '.$row['extension'].'</td>
                        </tr>
                        <tr>
                        <td>Movil: </td>
                        <td>'.$row['movil'].'</td>
                        </tr>
                        
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>