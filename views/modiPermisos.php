   <form role="form" action="../controller/PermisosControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Permisos.php";


         
							$codigo=$_POST["employee_id"];
					     $misPermisoss = new Permisos();
                         $catego = $misPermisoss->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Tipo Usuario</label>
                  <input type="text" class="form-control" value="'.$row["nombre"].'" id="nombre" name="nombre">
                  <input type="hidden" name="id_tipo_usuario" id="id_tipo_usuario" value="'.$row['id_tipo_usuario'].'"/>  
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Permisos</label>
                    <div class="table-responsive">  
                   <table class="table table-bordered">
                          <tr>
                            <td>Permisos</td>
                            <td></td>
                          <tr>
                          <tr>
                          <td>Usuarios</td>
                          ';
                          if (isset($row['campo_a']) && $row['campo_a']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_a" id="campo_a" checked value="<li><a href="../listas/Usuarios.php">Usuarios</a></li>"></td>
                            ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_a" id="campo_a" value="<li><a href="../listas/Usuarios.php">Usuarios</a></li>"></td>
                             ';
                          }

                           
                          echo'
                          </tr>
                          <tr>
                          <td>Tipo Usuarios</td>';
                           if (isset($row['campo_b']) && $row['campo_b']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_b" id="campo_b" checked value="<li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_b" id="campo_b" value="<li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>"></td> 
                            ';
                          }

                          echo'
                          </tr>
                          <tr>   
                          <td>Clientes</td>
                          ';
                          if (isset($row['campo_c']) && $row['campo_c']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" checked value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td> 
                             ';
                          }
                          echo'
                          
                          </tr>
                          <tr>
                          <td>Categorias</td>';
                          if (isset($row['campo_d']) && $row['campo_d']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" checked value="<li><a href="../listas/lista_categorias.php">Categorias</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Contactos</td>
                         ';  
                         if (isset($row['campo_e'])&& $row['campo_e']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_e" id="campo_e" checked value="<li><a href="../listas/contactos.php?id=""&nombre=Seleccione un Cliente">Contactos</a></li>"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_e" id="campo_e" value="<li><a href="../listas/contactos.php?id=""&nombre=Seleccione un Cliente">Contactos</a></li>"></td> 
                             ';
                          }

                         echo'
                          </tr>
                              <tr>
                          <td>Grupo Productos</td>';
                          if (isset($row['campo_f'])&& $row['campo_f']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" checked value="<li><a href="../listas/lista_grupo_producto.php">Grupo de Productos</a></li>"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" value="<li><a href="../listas/lista_grupo_producto.php">Grupo de Productos</a></li>"></td>
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Productos</td>';
                          if (isset($row['campo_g'])&& $row['campo_g']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_g" id="campo_g" checked value="<li><a href="../listas/Productos.php">Productos</a></li>"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_g" id="campo_g" value="<li><a href="../listas/Productos.php">Productos</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Productos de Clientes</td>';
                          if (isset($row['campo_h'])&& $row['campo_h']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" checked value="<li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" value="<li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Repuestos</td>';
                          if (isset($row['campo_i'])&& $row['campo_i']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" checked value="<li><a href="../listas/Repuestos.php">Repuestos</a></li>"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" value="<li><a href="../listas/Repuestos.php">Repuestos</a></li>"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Ticket</td>';
                          if (isset($row['campo_j'])&& $row['campo_j']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" checked value="<li><a href="../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0">Ticket</a></li>"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" value="<li><a href="../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0">Ticket</a></li>"></td>
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Gestion</td>';
                          if (isset($row['campo_k'])&& $row['campo_k']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_k" id="campo_k" checked value="<li><a href="../listas/Gestion.php">Gestiones</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_k" id="campo_k" value="<li><a href="../listas/Gestion.php">Gestiones</a></li>"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Tipo de Gestion</td>';
                          if (isset($row['campo_l'])&& $row['campo_l']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_l" id="campo_l" checked value="<li><a href="../listas/TipoGestion.php">Tipo de Gestion</a></li>"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_l" id="campo_l" value="<li><a href="../listas/TipoGestion.php">Tipo de Gestion</a></li>"></td>
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Ficha Tecnica</td>';
                          if (isset($row['campo_m'])&& $row['campo_m']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" checked value="<li><a href="../listas/FichaTecnca.php">Fichas Tecnica</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" value="<li><a href="../listas/FichaTecnca.php">Fichas Tecnica</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Agenda</td>';
                          if (isset($row['campo_n'])&& $row['campo_n']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" checked value="<li><a href="indexAdmin.php">Agenda</a></li>"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" value="<li><a href="indexAdmin.php">Agenda</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Permisos</td>';
                          if (isset($row['campo_o'])&& $row['campo_o']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_o" id="campo_o" checked value="<li><a href="../listas/Permisos.php">Permisos</a></li>"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_o" id="campo_o" value="<li><a href="../listas/Permisos.php">Permisos</a></li>"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          </table>
                          </div>
                          
                  
                </div>';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Permisos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>