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
if($accion=="descargar"){

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
                        $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);
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
                          <td colspan=2> <img src="../fotos/fichaTecnica'.$codigo.'/ubicacion_fichaTecnica_'.$codigo.'.png"/><td>
                           </tr>
                             <tr>
                           <td><strong>Entrada :</strong> '.$key["hora_ingreso"].'</td>
                           <td><strong>Salida :</strong> '.$hora_egreso.'</td>
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

                           for ($i=0; $i <= $falla_count; $i++) { 
                             echo $array_falla[$i];
                           }

                                                     
                          echo' 
                   <table class="table table-bordered">
                           <tr>
                           <td><strong>Datos generales:</strong> </td>
                           
                           </tr>
                           <tr>
                           <td>'.$key["datos_generales"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Solucion:</strong> </td>
                           
                           </tr>
                           
                           </table>';
                          
                           $trabajo= $key["trabajo"];
                           $array_trabajo = str_split($trabajo);
                           $trabajo_count = strlen($trabajo);

                           for ($a=0; $a <= $trabajo_count; $a++) { 
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
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="35%" height="35%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="35%" height="35%" border="1"></td>
                           </tr>
                           
             </table>
                   </div>
                   <br>
                   <br>
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
elseif($accion=="enviar"){
  $fichat=$_POST['id_ft'];
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
              
                         $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($fichat);

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
                           <td><strong>Entrada :</strong> '.$key["hora_ingreso"].'</td>
                           <td><strong>Salida :</strong> '.$hora_egreso.'</td>
                           </tr>
                           <tr>
                           <td><strong>Tipo:</strong> </td>
                           <td>'.$key["tipo_maquina"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Falla reportada:</strong> </td>
                          
                           </tr>
                           ';
                           echo '</table>';
                           $falla =$key["falla"];
                           $array_falla = str_split($falla);
                           $falla_count = strlen($falla);

                           for ($i=0; $i <= $falla_count; $i++) { 
                             echo $array_falla[$i];
                           }

                                                     
                          echo' 
                   <table class="table table-bordered">
                           <tr>
                           <td><strong>Datos generales:</strong> </td>
                           
                           </tr>
                           <tr>
                           <td>'.$key["datos_generales"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Solucion:</strong> </td>
                           
                           </tr>
                           
                           </table>';
                          
                           $trabajo= $key["trabajo"];
                           $array_trabajo = str_split($trabajo);
                           $trabajo_count = strlen($trabajo);

                           for ($a=0; $a <= $trabajo_count; $a++) { 
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
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="35%" height="35%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="35%" height="35%" border="1"></td>
                           </tr>
                           
             </table>
                   </div>
                   <br>
                   <br>
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
                    
                } ?>
</body>
</html>
<?php
  $correo = $_POST['destino'];
  $nombre = $_POST['nombre'];

  $bandera = $_POST['bandera'];

  $jefe = $_POST['cc']; 
  $cc1 = $_POST['cc1']; 
  $cc2 = $_POST['cc2']; 
  if(isset($_POST['cc3'])){
   $cc3 = $_POST['cc3'];
  }else{
    $cc3 = "N/A";
  }
  

                         $miFi = new FichaTecnica();
                         $ft1 = $miFi->selectOne($fichat);

                    foreach ($ft1 as $keys) {
                      $fecha_t=$keys['fecha_trabajo'];
                    }

//$correo = 'jhosuegarciastarkand@gmail.com';
  $dompdf1 = new DOMPDF();
  $dompdf1->set_option('enable_html5_parser', TRUE);
$dompdf1->load_Html(ob_get_clean());
$dompdf1->render();
  $filename1 = 'fichaTecnica_'.$fichat.'.pdf';

  $pdf =$dompdf1->output();
  file_put_contents($_SERVER['DOCUMENT_ROOT'].'/Hermes/enviados/'.$filename1, $pdf);
	//$archivo=$dompdf1->stream($filename1);

	$sending = new Mailer("Ficha Tecnica: ".$fichat."", "Ficha Tecnica:",$filename1, $correo,$jefe,$cc1,$cc2,$cc3,$nombre,$fecha_t);
    $resultado = $sending->enviarCorreo();
  if ($resultado ==1) {
    if ($bandera=="admin") {
      header('Location: ../listas/FichaTecnca.php?success=correcto');
    }elseif($bandera=="usuario"){

      header('Location: ../listas/FichaTecnca_u.php?success=correcto');

    }
    
  }
           
}
?>