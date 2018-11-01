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
                        <td></td>
                        </tr>
                        ';

                        if (($row['campo_a'])!=NULL) {
                          echo '<tr><td>Usuarios</td><td>Si</td></tr>';
                        }
                        if (($row['campo_b'])!=NULL) {
                          echo '<tr><td>Tipo Usuarios</td><td>Si</td></tr>';
                        }
                        if (($row['campo_c'])!=NULL) {
                          echo '<tr><td>Clientes</td><td>Si</td></tr>';
                        }
                        if (($row['campo_d'])!=NULL) {
                          echo '<tr><td>Categorias de clientes</td><td>Si</td></tr>';
                        }
                        if (($row['campo_e'])!=NULL) {
                          echo '<tr><td>Contactos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_f'])!=NULL) {
                          echo '<tr><td>Grupo de productos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_g'])!=NULL) {
                          echo '<tr><td>Productos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_h'])!=NULL) {
                          echo '<tr><td>Productos de clientes</td><td>Si</td></tr>';
                        }
                        if (($row['campo_i'])!=NULL) {
                          echo '<tr><td>Repuestos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_j'])!=NULL) {
                          echo '<tr><td>Tickets</td><td>Si</td></tr>';
                        }
                        if (($row['campo_k'])!=NULL) {
                          echo '<tr><td>Gestion</td><td>Si</td></tr>';
                        }
                        if (($row['campo_l'])!=NULL) {
                          echo '<tr><td>Tipo de Gestion</td><td>Si</td></tr>';
                        }
                        if ($row['campo_m']!=NULL) {
                          echo '<tr><td>Ficha Tecnica</td><td>Si</td></tr>';
                        }
                        if (($row['campo_n'])!=NULL) {
                          echo '<tr><td>Agenda</td><td>Si</td></tr>';
                        }
                        if (($row['campo_o'])!=NULL) {
                          echo '<tr><td>Permisos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_p'])!=NULL) {
                          echo '<tr><td>Extras</td><td>Si</td></tr>';
                        }
                        echo '
                        
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>