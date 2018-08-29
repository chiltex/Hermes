 <form role="form" action="../controller/ProductosControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Productos.php";


         
							$codigo=$_POST["employee_id"];
					     $miProducto = new Productos();
                         $producto= $miProducto->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$producto as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Nombre</label>
                  <input type="text" class="form-control" value="'.$row["nombre"].'" id="nombre" name="nombre">
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Codigo Serie</label>
                  <input type="text" class="form-control" required="" value="'.$row["codigo_serie"].'" id="codigo_serie" name="codigo_serie" placeholder="Nombre">
                </div>
                 <div class="form-group">
                  <label for="nombre">GrupoProducto</label>
                   <select  id="id_grupo_producto" name="id_grupo_producto" class="form-control ">';
                   $producto=$miProducto->selectOneGP($row['id_grupo_producto']);
                             foreach ($producto as $rew) {
                             echo '
                          <option value="'.$rew["id_grupo_producto"].'">'.$rew["nombre"].'</option>
                         ';
                           }
                          $dgp=$miProducto->selectOneDGP($row['id_grupo_producto']);
                             foreach ($dgp as $cew) {
                             echo '
                          <option value="'.$cew["id_grupo_producto"].'">'.$cew["nombre"].'</option>
                               ';
                           }

              echo'
              </select>
                </div>


                ';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Productos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>