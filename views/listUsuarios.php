<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
--> <a href="listas/Usuarios.php" class="btn btn-primary">Nuevo Usuario</a>
       <table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                          <th>Nombre</th>
                      
                          <th>Seleccionar</th>                          
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 
  
  require_once "../class/Events1.php";
  						 $codigo=$_POST["employee_id"];
                         $misEvents = new Events();
                        $TU=$misEvents->selectOperadores();

               foreach ($TU as $row) {
          				 
                  echo '
                          <tr>
                            <td>'.$row['nombre'].' '.$row['apellido'].'</td>
                          <td>
                         <a href="indexAdmin.php?id='.$row["id_usuario"].'&nombre='.$row["nombre"].' '.$row['apellido'].'" class="btn btn-primary">Seleccionar</a>
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