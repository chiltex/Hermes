<?php 
// Composer's auto-loading functionality


// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require '../vendors/dompdf/dompdf_config.inc.php';

//if you get errors about missing classes please also add:
require_once('../vendors/dompdf/include/autoload.inc.php');

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
  						 $codigo=$_GET["id"];
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
                           <td><strong>Producto:</strong> </td>
                           <td>'.$key["prod"].'</td>
                           </tr>

                          
                           <tr>
                           <td><strong>Falla:</strong> </td>
                           <td>'.$key["falla"].'</td>
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
                           <td>'.$key["tipo_maqui"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Falla reportada:</strong> </td>
                           <td>'.$key["falla"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Solucion:</strong> </td>
                           
                           </tr>
                           <tr>
                          
                           <td>'.$key["trabajo"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Equipo se entrega:</strong> </td>
                           <td>'.$key["equipo_queda"].'</td>
                           </tr>
                           <tr>
                           <td><strong>Recibe:</strong> '.$key["recibe"].' </td>
                           <td><strong>Tecnico Encargado:</strong> '.$key["usuario"].'</td>
                           </tr>
                            <tr>
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="35%" height="35%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="35%" height="35%" border="1"></td>
                           </tr>
                           
						 </table>
          				 </div>
          				 ';
                	
                    
                }
?>

</body>
</html>
<?php
require_once("../vendors/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_Html(ob_get_clean());
$dompdf->render();
$pdf =$dompdf->output();
$filename = 'prueba.pdf';
$dompdf->stream($filename, array('Attachment' => 0));

 ?>