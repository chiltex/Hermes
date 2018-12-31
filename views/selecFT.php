<?php 
  require_once "../class/FichaTenica.php";
  						 $codigo=$_POST["employee_id"];
                         $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);

                    foreach ($ft as $key) {
                      if ($key['hora_egreso']==NULL) {
                        $hora_egreso= "00:00:00";
                      }else{
                        $hora_egreso= $key['hora_egreso'];
                      }
                    	echo'
                    	 <div class="table-responsive">  
          				 <table class="table table-bordered">
          				 '; 
                   echo '
                          <tr>
                           <td>Ficha Tecnica N°: </td>
                           <td>'.$key['id_ficha_tecnica'].'</td>
                          </tr>
                           <tr>
                           <td>Cliente: </td>
                           <td>'.$key["clie"].'</td>
                           </tr>
                           <tr>
                           <td>Contacto: </td>
                           <td>'.$key["contac"].'</td>
                           </tr>
                           <tr>
                           <td>Producto: </td>
                           <td>'.$key["prod"].'</td>
                           </tr>

                          
                           <tr>
                           <td>Falla: </td>
                           <td>'.$key["falla"].'</td>
                           </tr>
                            <tr>
                           <td>Ubicacion: </td>
                           <td>Latitud: '.$key["latitud"].', Longitud: '.$key["longitud"].'</td>
                           </tr>
                             <tr>
                           <td>Entrada : '.$key["hora_ingreso"].'</td>
                           <td>Salida : '.$hora_egreso.'</td>
                           </tr>
                           <tr>
                           <td>Solucion: </td>
                           <td>'.$key["trabajo"].'</td>
                           </tr>
                            <tr>
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="75%" height="75%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="75%" height="75%" border="1"></td>
                           </tr>
                           <tr>
                           </tr>
						 </table>
                           </div>


                           <section class="awSlider">
  <div  class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../fotos/fichaTecnica'.$codigo.'/'.$key["foto_uno"].'" width="30%" height="30%" border="1"> 
        <div class="carousel-caption">Imagen</div>
      </div>
     
      
    ';
    foreach(glob('../fotos/fichaTecnica'.$codigo.'/*') as $image) {
    echo '
      <div class="item">
      <img src="'.$image.'" width="30%" height="30%" border="1">
        <div class="carousel-caption">Imagen</div>
      </div>
    ';
    }


    echo'</div>
    <!-- Controls -->
    <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Geri</span>
    </a>
    <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">İleri</span>
    </a>
  </div>
</section>
          				 ';
                	
                    
                }
?>

<script>
$('section.awSlider .carousel').carousel({
  pause: "hover",
  interval: 2000
});

var startImage = $('section.awSlider .item.active > img').attr('src');

$('section.awSlider .carousel').on('slid.bs.carousel', function () {
 var bscn = $(this).find('.item.active > img').attr('src');
  $('section.awSlider > img').attr('src',bscn);
});


</script>
