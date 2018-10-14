<?php
require_once "../class/Permisos.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new Permisos();
                         $catego = $misCategorias->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_permiso'].'</td>
                        </tr>
                        <tr>
                        <td>Tipo Usuario:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        <td>Permisos</td>
                        ';
                        if (is_null($row['campo_a'])==false) {
                          echo '<td>'$row['campo_a']'</td>';
                        }
                        if (is_null($row['campo_b'])==false) {
                          echo '<td>'$row['campo_b']'</td>';
                        }
                        if (is_null($row['campo_c'])==false) {
                          echo '<td>'$row['campo_c']'</td>';
                        }
                        if (is_null($row['campo_d'])==false) {
                          echo '<td>'$row['campo_d']'</td>';
                        }
                        if (is_null($row['campo_e'])==false) {
                          echo '<td>'$row['campo_e']'</td>';
                        }
                        if (is_null($row['campo_f'])==false) {
                          echo '<td>'$row['campo_f']'</td>';
                        }
                        if (is_null($row['campo_g'])==false) {
                          echo '<td>'$row['campo_g']'</td>';
                        }
                        if (is_null($row['campo_h'])==false) {
                          echo '<td>'$row['campo_h']'</td>';
                        }
                        if (is_null($row['campo_i'])==false) {
                          echo '<td>'$row['campo_i']'</td>';
                        }
                        if (is_null($row['campo_j'])==false) {
                          echo '<td>'$row['campo_j']'</td>';
                        }
                        if (is_null($row['campo_k'])==false) {
                          echo '<td>'$row['campo_k']'</td>';
                        }
                        if (is_null($row['campo_l'])==false) {
                          echo '<td>'$row['campo_l']'</td>';
                        }
                        if (is_null($row['campo_m'])==false) {
                          echo '<td>'$row['campo_m']'</td>';
                        }
                        if (is_null($row['campo_n'])==false) {
                          echo '<td>'$row['campo_n']'</td>';
                        }
                        if (is_null($row['campo_o'])==false) {
                          echo '<td>'$row['campo_o']'</td>';
                        }
                        if (is_null($row['campo_p'])==false) {
                          echo '<td>'$row['campo_p']'</td>';
                        }
                        echo '
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>