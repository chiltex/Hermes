<?php 
// Composer's auto-loading functionality

   require_once '../class/Mailer.php';
 
 $accion=$_GET["accion"];
// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require '../vendors/dompdf/dompdf_config.inc.php';

//if you get errors about missing classes please also add:
require_once('../vendors/dompdf/include/autoload.inc.php');
require_once("../vendors/dompdf/dompdf_config.inc.php");
if($accion=="tecnico"){

  $codigo=$_GET["id"];
ob_start();
?>
<!DOCTYPE html>
<html>
  <head>

  <title>Ficha Tecnica</title>

</head>
  <body>


                    <img src="../src/cabecera.png" alt="..." width="100%" height="40%">
                    <br>
    <?php 
            require_once "../class/FichaTenica.php";
            require_once "../class/Contactos.php";
            require_once "../class/Repuestos.php";
            require_once "../class/Consumibles.php";
                        $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);
                         $repuestos = new Repuestos();
                         $misRepuestos = $repuestos->selectOneDR($codigo);
                         $consumibles = new Consumibles();
                         $misConsumibles = $consumibles->selectOneDR($codigo);
                    foreach ($ft as $key){
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
                           <td><strong>Ficha Tecnica N°:</strong> </td>
                           <td>'.$key['id_ficha_tecnica'].'</td>
                          </tr>
                           <tr>
                           <td><strong>Cliente:</strong> </td>
                           <td>'.$key["clie"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Contacto:</strong> </td>
                           <td>'.$key["contac"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Linea de Produccion:</strong> </td>
                           <td>'.$key["linea_produccion"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Fecha del Problema:</strong> </td>
                           <td>'.$key["fecha_trabajo"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Producto:</strong> </td>
                           <td>'.$key["prod"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Serie:</strong> </td>
                           <td>'.$key["codigo_serie"].'</td>
                           </tr>
                          
                           <tr>
                           <td><strong>Ubicacion:</strong> </td>
                           <td>Latitud: '.$key["latitud"].', Longitud: '.$key["longitud"].'</td>

                           </tr>
                           <tr>
                          <td colspan=2> <td>
                           </tr>
                             <tr>
                           <td><strong>Entrada :</strong> '.$key["hora_ingreso"].'</td>
                           <td><strong>Salida :</strong> '.$hora_egreso.'</td>
                           </tr>
                           <tr>
                           <td><strong>Tipo de Trabajo:</strong> </td>
                           <td>'.$key["tipo_trabajo"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Tipo:</strong> </td>
                           <td>'.$key["tipo_maquina"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Falla reportada:</strong> </td>
                           </tr>';
                           echo '</table>';
                           $falla =$key["falla"];
                           $array_falla = str_split($falla);
                           $falla_count = strlen($falla);

                           for ($i=0; $i < $falla_count; $i++) { 
                             echo $array_falla[$i];
                           }

                                                     
                          echo' 
                   <table class="table table-bordered">
                           <tr>
                           <td><strong>Datos generales:</strong> </td>
                           
                           </tr>
                           ';
                           if ($key['datos_generales']!= 'N/A') {
                           echo '<tr><td>'.nl2br($key["datos_generales"]).'</td></tr>';
                           }else{
                            echo ' 
                            <tr>
                           <td><strong>Horas Maquina:</strong> </td>
                           <td>'.$key["horas_maquina"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Horas Bomba:</strong> </td>
                           <td>'.$key["horas_bomba"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Make Up:</strong> </td>
                           <td>'.$key["make_up"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Tinta:</strong> </td>
                           <td>'.$key["tinta"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Cleaning:</strong> </td>
                           <td>'.$key["cleaning"].'</td>
                           </tr>
                            <tr>
                           <td><strong>Software:</strong> </td>
                           <td>'.$key["software"].'</td>
                           </tr>
                           ';

                           }
                           
                           echo '
                           <tr>
                           <td><strong>Solucion:</strong> </td>
                           
                           </tr>
                           
                           </table>';
                          
                           $trabajo= $key["trabajo"];
                           $array_trabajo = str_split($trabajo);
                           $trabajo_count = strlen($trabajo);

                           for ($a=0; $a < $trabajo_count; $a++) { 
                             echo $array_trabajo[$a];
                           }
                          echo'
                   <table class="table table-bordered">

                           <tr>
                           <td><strong>Equipo se entrega:</strong> </td>
                           <td>'.$key["equipo_queda"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Recibe:</strong> '.$key["recibe"].' </td>
                           <td><strong>Tecnico Encargado:</strong> '.$key["usuario"].' '.$key['usuario_ape'].'</td>
                           </tr>
                            <tr>
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="45%" height="45%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="45%" height="45%" border="1"></td>
                           </tr>
                           
             </table>
                   </div>
                   <br>
                   <div class="table-responsive">
                   <label><strong><h2>Detalle Repuestos:</h2></strong></label>
                   <table class="table table-bordered" style="border-collapse: collapse;" border="1">
                   <thead>
                    <tr>
                    <th>Repuesto</th>
                    <th>Cantidad</th>
                    </tr>
                   </thead>
                   <tbody>';
                   foreach ($misRepuestos as $key) {
                   echo '
                    <tr>
                      <td>'.$key['nombre'].'</td>
                      <td>'.$key['cantidad'].'</td>
                    </tr>
                   ';
                   }

                   echo '</tbody>
                   </table>
                   <br>  <br>
                   <label><strong><h2>Detalle Consumibles:</h2></strong></label>
                   <table class="table table-bordered" style="border-collapse: collapse;" border="1">
                   <thead>
                    <tr>
                    <th>Repuesto</th>
                    <th>Cantidad</th>
                    </tr>
                   </thead>
                   <tbody>';
                   foreach ($misConsumibles as $key1) {
                   echo '
                    <tr>
                      <td>'.$key1['nombre'].'</td>
                      <td>'.$key1['cantidad'].'</td>
                    </tr>
                   ';
                   }

                   echo '</tbody>
                   </table>
                   </div>
                   <img src="../fotos/fichaTecnica'.$codigo.'/ubicacion_fichaTecnica_'.$codigo.'.png"/>
                   <br>  <label> <H1>Fotografias</H1></label>
                   <ul>';

                  $FOTO = 1;
                foreach(glob('../fotos/fichaTecnica'.$codigo.'/*') as $image) {
                echo '
                   <li>Imagen '.$FOTO.' Equipo<br> <img src="'.$image.'" width="50%" height="50%"></li>
                 <br>
                ';
                $FOTO = $FOTO + 1;
                }
                echo '</ul>';

                    
                }
      ?>
  </body>
</html>

<?php
$dompdf = new DOMPDF();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->load_Html(ob_get_clean());
$dompdf->render();
$filename = 'fichaTecnica_'.$codigo.'.pdf';  $pdf =$dompdf->output();
$dompdf->stream($filename, array('Attachment' => 0));
}//end if descargar


 ?>