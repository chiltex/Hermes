<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1

--> 
<?php 

               $codigo=$_POST["employee_id"];

               $empresa=$_POST["employee_name"];
               $bandera=$_POST["bandera"];
               echo '<a href="../listas/Cliente_Producto.php?cliente='.$codigo.'&nombre='.$empresa.'&producto=0" class="btn btn-primary">Nuevo Producto</a>';
 ?>
<table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Codigo Serie</th>
                          <th>Seleccionar</th>                          
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 
  
  require_once "../class/Productos.php";
                         $misProductos = new Productos();
                         $pro = $misProductos->selectALL();

                         require_once "../class/ClienteProducto.php";
                         $ms = new ClienteProducto();
                         $contacto = $ms->selectALL($codigo);

               foreach ($contacto as $row) {
          				 
                  echo '
                          <tr>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['codigo_serie'].'</td>
                           		';
                            
                           
                  echo'

          				        <td>
                         <a href="../views/saveFT.php?cliente='.$codigo.'&id_producto='.$row["id_producto"].'&producto='.$row["nombre"].'&codigo_serie='.$row["codigo_serie"].'&nombre='.$empresa.'&bandera='.$bandera.'" class="btn btn-primary">Seleccionar</a>
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
      'autoWidth'   : true
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