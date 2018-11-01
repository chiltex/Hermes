<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
--> <a href="../listas/Productos.php" class="btn btn-primary">Nuevo Producto</a>
       <table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                          <th>Codigo Serie</th>
                          <th>Nombre / Compañia</th>
                          <th>Categoria</th>
                          <th>Seleccionar</th>                          
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 
  
  require_once "../class/Productos.php";
  						 $codigo=$_POST["employee_id"];
                         $misProductos = new Productos();
                         $pro = $misProductos->selectALL();

               foreach ($pro as $row) {
          				 
                  echo '
                          <tr>
                            <td>'.$row['codigo_serie'].'</td>
                            <td>'.$row['nombre'].'</td>
                           		';
                              $grupo_producto=$misProductos->selectOneGP($row['id_grupo_producto']);
                           foreach ($grupo_producto as $rew) {
                             echo '<td>'.$rew['nombre'].'</td>';
                           }
                           
                  echo'

          				        <td>
                         <a href="../controller/ClienteProductoControlador.php?cliente='.$codigo.'&producto='.$row["id_producto"].'&accion=guardar" class="btn btn-primary">Agregar</a>
                         </td>
                          </tr>
                         ';
                	
                    
                }
?> </tbody>  </table>
</div>
</div>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

 $(document).ready(function () {
 
            (function ($) {
 
                $('#filtrar').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
 
            }(jQuery));
 
        }); 

    
    </script>