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
                            echo '<td><input type="checkbox" name="campo_a" id="campo_a" checked value="../listas/Usuarios.php"></td>
                            ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_a" id="campo_a" value="../listas/Usuarios.php"></td>
                             ';
                          }

                           
                          echo'
                          </tr>
                          <tr>
                          <td>Tipo Usuarios</td>';
                           if (isset($row['campo_b']) && $row['campo_b']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_b" id="campo_b" checked value="../listas/TipoUsuario.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_b" id="campo_b" value="../listas/TipoUsuario.php"></td> 
                            ';
                          }

                          echo'
                          </tr>
                          <tr>   
                          <td>Clientes</td>
                          ';
                          if (isset($row['campo_c']) && $row['campo_c']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" checked value="../listas/clientes.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" value="../listas/clientes.php"></td> 
                             ';
                          }
                          echo'
                          
                          </tr>
                          <tr>
                          <td>Categorias</td>';
                          if (isset($row['campo_d']) && $row['campo_d']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" checked value="../listas/lista_categorias.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" value="../listas/clientes.php"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Contactos</td>
                         ';  
                         if (isset($row['campo_e'])&& $row['campo_e']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_e" id="campo_e" checked value="../listas/contactos.php?id=0&nombre=Seleccione un Cliente"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_e" id="campo_e" value="../listas/contactos.php?id=0&nombre=Seleccione un Cliente"></td> 
                             ';
                          }

                         echo'
                          </tr>
                              <tr>
                          <td>Grupo Productos</td>';
                          if (isset($row['campo_f'])&& $row['campo_f']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" checked value="../listas/lista_grupo_producto.php"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" value="../listas/lista_grupo_producto.php"></td>
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Productos</td>';
                          if (isset($row['campo_g'])&& $row['campo_g']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_g" id="campo_g" checked value="../listas/Productos.php"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_g" id="campo_g" value="../listas/Productos.php"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Productos de Clientes</td>';
                          if (isset($row['campo_h'])&& $row['campo_h']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" checked value="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" value="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Repuestos y Consumibles</td>';
                          if (isset($row['campo_i'])&& $row['campo_i']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" checked value="../listas/Repuestos.php"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" value="../listas/Repuestos.php"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Ticket(Asignacion, Consulta y Modificar)</td>';
                          if (isset($row['campo_j'])&& $row['campo_j']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" checked value="../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" value="../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0"></td>
                             ';
                          }
                          echo'
                          </tr> <tr>
                          <td>Tickets(Consula y modificar)</td>';
                          if (isset($row['campo_q'])&& $row['campo_q']!=NULL) {
                             echo '<td><input type="checkbox" name="campo_q" id="campo_q" checked value="../listas/Tickets_u.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0"></td>
                             ';
                          }else
                          {
                             echo '<td><input type="checkbox" name="campo_q" id="campo_q" value="../listas/Tickets_u.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0"></td>
                             ';
                          }
                          echo'</tr>
                            <tr>
                          <td>Gestion</td>';
                          if (isset($row['campo_k'])&& $row['campo_k']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_k" id="campo_k" checked value="../listas/Gestion.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_k" id="campo_k" value="../listas/Gestion.php"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Tipo de Gestion</td>';
                          if (isset($row['campo_l'])&& $row['campo_l']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_l" id="campo_l" checked value="../listas/TipoGestion.php"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_l" id="campo_l" value="../listas/TipoGestion.php"></td>
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Ficha Tecnica</td>';
                          if (isset($row['campo_m'])&& $row['campo_m']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" checked value="../listas/FichaTecnca.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" value="../listas/FichaTecnca.php"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Agenda</td>';
                          if (isset($row['campo_n'])&& $row['campo_n']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" checked value="indexAdmin.php"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" value="indexAdmin.php"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Permisos</td>';
                          if (isset($row['campo_o'])&& $row['campo_o']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_o" id="campo_o" checked value="../listas/Permisos.php"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_o" id="campo_o" value="../listas/Permisos.php"></td> 
                             ';
                          }
                          echo'
                            <tr>
                          <td>Extras(Formulario retorno y Calidad)</td>';
                          if (isset($row['campo_p'])&& $row['campo_p']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_p" id="campo_p" checked value="../listas/lista_PartFailure.php"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_p" id="campo_p" value="../listas/Permisos.php"></td> 
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