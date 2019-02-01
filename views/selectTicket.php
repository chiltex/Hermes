<?php
require_once "../class/Calidad.php";
                          $codigo=$_POST['employee_id'];
							
                         require_once "../class/Ticket.php";
                         $misTickets = new Ticket();
                         $catego = $misTickets->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {

                          $tipo=$misTickets->selectOneTG($row['id_tipo_gestion']);
                          $tecnico=$misTickets->selectOneU($row['id_usuario']);
                          $jefe=$misTickets->selectOneU($row['id_jefe']);
                          $cliente=$misTickets->selectOneCliente($row['id_cliente']);
                          $Producto = $misTickets->selectPr($row['id_producto'],$row['id_cliente']);
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_ticket'].'</td>
                        </tr>
                        <tr>
                        <td>Cliente:</td>';
                        foreach ($cliente as $key) {
                          echo '<td>'.$key['nombre'].'</td>';
                        }
                                                
                        echo'</tr>
                        <tr>
                        	<td> Producto/Codigo serie: </td>';
                          foreach ($Producto as $key1) {
                            echo '<td>'.$key1['nombre'].'/'.$key1['codigo_serie'].'</td>';
                          }                      
                       echo ' </tr>
                        <tr>
                        <td>Gestion:</td>';
                        foreach ($tipo as $rew) {
                          echo '<td>'.$rew['nombre'].'-'.$rew['gestions'].'</td>';
                        }
                        
                        
                        echo' </tr>
                        <tr>
                        <td>Falla Reportada:</td>
                        <td>'.$row['descripcion'].'</td>
                        </tr>
                        <tr>
                        <td>Asignado a:</td>';
                        foreach ($tecnico as $key2) {
                         echo'
                        <td>'.$key2['nombre'].' '.$key2['apellido'].'</td>';
                        }
                        echo'</tr>
                        <tr>
                        <td>Asignado por:</td>';
                        foreach ($jefe as $key3) {
                         echo '<td>'.$key3['nombre'].' '.$key3['apellido'].'</td>';
                        }
                        
                       echo' </tr>
                        <tr>
                        <td>Urgemte:</td>
                        <td>'.$row['urgente'].'</td>
                        </tr>
                        <tr>
                        <td>Solucion:</td>
                        <td>'.$row['Solucion'].'</td>
                        </tr>
                        
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>