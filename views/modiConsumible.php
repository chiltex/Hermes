 <form role="form" action="../controller/ConsumibleControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Consumible.php";


         
							$codigo=$_POST["employee_id"];
					     $miRepuesto = new Consumible();
                         $repuesto= $miRepuesto->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$repuesto as $row) {
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
                  <label for="nombre">Descripcion</label>
                    <input type="text" class="form-control" required="" value="'.$row["descripcion"].'" id="descripcion" name="descripcion" placeholder="Nombre">
                </div>


                ';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Consumible.php'" name="cancel" value="Cancelar" >
              </div>
            </form>