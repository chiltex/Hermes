<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
-->
<div id="employee_table">
       <table id="example1" class="table table-striped table-bordered" name="example1">
         <thead>
                        <tr>
                          <th>Codigo</th>
                      
                          <th>Nombre</th>                          
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 
  
  require_once "../class/PartFailure.php";
                         $misEvents = new PartFailure();
                        $TU=$misEvents->selectALL();

               foreach ($TU as $row) {
                   
                  echo '
                          <tr>
                            <td><strong>P</strong>'.$row['id_part_fail'].'</td>
                          <td>
                          '.$row['nombre'].'
                          </td>
                          </tr>
                         ';
                  
                    
                }
?> </tbody> 
 </table>
 </div>
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