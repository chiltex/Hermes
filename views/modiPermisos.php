   <form role="form" action="../controller/GestionControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Gestion.php";


         
							$codigo=$_POST["employee_id"];
					     $misGestions = new Gestion();
                         $catego = $misGestions->selectOne($codigo);
                        
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
                          if (is_null($row['campo_a'])) {
                            echo '
                            <td><input type="checkbox" name="campo_a" id="campo_a" value="<li><a href="../listas/Usuarios.php">Usuarios</a></li>"></td> ';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_a" id="campo_a" checked value="<li><a href="../listas/Usuarios.php">Usuarios</a></li>"></td> ';
                          }

                           
                          echo'
                          </tr>
                          <tr>
                          <td>Tipo Usuarios</td>';
                           if (is_null($row['campo_b'])) {
                            echo '
                            <td><input type="checkbox" name="campo_b" id="campo_b" value="<li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_b" id="campo_b" checked value="<li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>"></td>';
                          }

                          echo'
                          </tr>
                          <tr>
                          <td>Clientes</td>
                          ';
                          if (is_null($row['campo_c'])) {
                            echo '
                            <td><input type="checkbox" name="campo_c" id="campo_c" value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_c" id="campo_c" checked value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td>';
                          }
                          echo'
                          
                          </tr>
                          <tr>
                          <td>Categorias</td>';
                          if (is_null($row['campo_d'])) {
                            echo '
                            <td><input type="checkbox" name="campo_d" id="campo_d" value="<li><a href="../listas/clientes.php">Clientes</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_d" id="campo_d" checked value="<li><a href="../listas/lista_categorias.php">Categorias</a></li>"></td>';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Contactos</td>
                         ';  
                         if (is_null($row['campo_e'])) {
                            echo '
                            <td><input type="checkbox" name="campo_e" id="campo_e" value="<li><a href="../listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_e" id="campo_e" checked value="<li><a href="../listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>"></td>';
                          }

                         echo'
                          </tr>
                              <tr>
                          <td>Grupo Productos</td>';
                          if (is_null($row['campo_f'])) {
                            echo '
                            <td><input type="checkbox" name="campo_f" id="campo_f" value="<li><a href="../listas/lista_grupo_producto.php">Grupo de Productos</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_f" id="campo_f" checked value="<li><a href="../listas/lista_grupo_producto.php">Grupo de Productos</a></li>"></td>';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Productos</td>';
                          if (is_null($row['campo_g'])) {
                            echo '
                            <td><input type="checkbox" name="campo_g" id="campo_g" value="<li><a href="../listas/Productos.php">Productos</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_g" id="campo_g" checked value="<li><a href="../listas/Productos.php">Productos</a></li>"></td>';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Productos de Clientes</td>';
                          if (is_null($row['campo_h'])) {
                            echo '
                            <td><input type="checkbox" name="campo_h" id="campo_h" value="<li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_h" id="campo_h" checked value="<li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>"></td>';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Repuestos</td>';
                          if (is_null($row['campo_i'])) {
                            echo '
                            <td><input type="checkbox" name="campo_i" id="campo_i" value="<li><a href="../listas/Repuestos.php">Repuestos</a></li>"></td> ';
                          }else
                          {
                            echo '
                             <td><input type="checkbox" name="campo_i" id="campo_i" checked value="<li><a href="../listas/Repuestos.php">Repuestos</a></li>"></td>';
                          }
                          echo'
                          </tr>

                          </table>
                          </div>
                          }
                  
                </div>';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Gestion.php'" name="cancel" value="Cancelar" >
              </div>
            </form>