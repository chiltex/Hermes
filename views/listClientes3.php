<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
--> <a href="../listas/clientes.php" class="btn btn-primary">Nuevo Cliente</a>
       <table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                          <th>Nombre / Compañia</th>
                          <th>Tipo</th>
                          <th>Categoria</th>
                          <th>Seleccionar</th>                          
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 
  
  require_once "../class/Cliente.php";
  						 $codigo=$_POST["employee_id"];
                         $misClientes = new Cliente();
                         $cliente = $misClientes->selectALL();

               foreach ($cliente as $row) {
                    	$tipo_cliente=$misClientes->selectOneTC($row['id_tip_cli']);
                          $categoria=$misClientes->selectOneCat($row['id_categoria']);
          				 
                  echo '
                          <tr>
                            <td>'.$row['nombre'].'</td>
                           					
          				';
                  foreach ($categoria as $key) {
                      echo '<td>'.$key['nombre'].'</td>';
                            }
                  foreach ($tipo_cliente as $rew) {
                             echo '<td>'.$rew['tipo_cliente'].'</td>';
                           }
                echo '
                           <td>
                         <a href="../views/saveTicket.php?cliente='.$row["id_cliente"].'&nombre='.$row["nombre"].'&codigo_serie=0000&producto=N/A&id_producto=0" class="btn btn-primary">Seleccionar</a>
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