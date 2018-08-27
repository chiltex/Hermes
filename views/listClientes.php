<div class="x_panel"> 
<div class="x_content"> 
       <table id="datatable-buttons" class="table table-striped table-bordered">
         <thead>
                        <tr>
                          <th>Nombre / Compañia</th>
                          <th>Dirección</th>
                          <th>Tipo</th>
                          <th>Categoria</th>
                          <th>Seleccionar</th>                          
                        </tr>
                      </thead>
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
                            <td>'.$row['direccion'].'</td>
                           					
          				';
                  foreach ($categoria as $key) {
                      echo '<td>'.$key['nombre'].'</td>';
                            }
                  foreach ($tipo_cliente as $rew) {
                             echo '<td>'.$rew['tipo_cliente'].'</td>';
                           }
                echo '
                           <td>
                         <a href="../listas/contactos.php?id='.$row["id_cliente"].'&nombre='.$row["nombre"].'" class="btn btn-primary">Seleccionar</a>
                          </tr>
                         ';
                	
                    
                }
?>   </table>
</div>
</div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');
    
    </script>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>