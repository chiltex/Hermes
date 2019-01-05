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
if ($accion=="descargar") {
  $codigo=$_GET["id"];
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reporte Calidad</title>
</head>
<style type="text/css">
  table {
   width: 100%;
   text-align: center;
}
th, td {
   width: 25%;
   text-align: left;
   margin-bottom: 25;
}
</style>
<body>

                    <img src="../src/cabecera1.png" alt="..." width="100%" height="40%">
                    <br>
                    <center>
<?php 
  require_once "../class/Calidad.php";

            
               $misCalidad = new Calidad();
                         $catego = $misCalidad->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
                   <table class="table table-striped">
                        <tr>
                          <td> N°</td>
                           <td>'.$row['id_reporte_calidad'].'</td>
                        </tr>
                        <tr>
                        <td>Cliente:</td>
                        <td>'.$row['cliente'].'</td>
                        </tr>
                        <tr>
                          <td> Pais: </td>
                           <td>'.$row["pais"].'</td>
                                                  
                        </tr>
                        <tr>
                        <td>Mes/año:</td>
                        <td>'.$row['mes'].'/'.$row['anio'].'</td>
                        </tr>
                        <tr>
                        <td>Instalado por:</td>
                        <td>'.$row['instalado_por'].'</td>
                        </tr>
                        <tr>
                        <td>Codigo de serie:</td>
                        <td>'.$row['codigo_serie'].'</td>
                        </tr>
                        <tr>
                        <td>tecnologia:</td>
                        <td>'.$row['tecnologia'].'</td>
                        </tr>
                        <tr>
                        <td>Modelo:</td>
                        <td>'.$row['modelo'].'</td>
                        </tr>
                        <tr>
                        <td>Error al instalar?:</td>
                        <td>'.$row['error_instalar'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     
                   
?>
</center>
</body>
</html>

<?php


$dompdf = new DOMPDF();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->load_Html(ob_get_clean());
$dompdf->render();

$filename = 'reporteCalidad_'.$codigo.'.pdf';  $pdf =$dompdf->output();
$dompdf->stream($filename, array('Attachment' => 0));
}

elseif($accion=="enviar"){
  $codigo1=$_POST['id_calidad'];


ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reporte Calidad</title>
</head>
<body>

                    <img src="../src/cabecera1.png" alt="..." width="100%" height="40%">
                    <br>
<?php 
  require_once "../class/Calidad.php";

            
               $misCalidad = new Calidad();
                         $catego = $misCalidad->selectOne($codigo1);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
                   <table class="table table-striped">
                        <tr>
                          <td> N°</td>
                           <td>P'.$row['id_reporte_calidad'].'</td>
                        </tr>
                        <tr>
                        <td>Cliente:</td>
                        <td>'.$row['cliente'].'</td>
                        </tr>
                        <tr>
                          <td> Pais: </td>
                           <td>'.$row["pais"].'</td>
                                                  
                        </tr>
                        <tr>
                        <td>Mes/año:</td>
                        <td>'.$row['mes'].'/'.$row['anio'].'</td>
                        </tr>
                        <tr>
                        <td>Instalado por:</td>
                        <td>'.$row['instalado_por'].'</td>
                        </tr>
                        <tr>
                        <td>Codigo de serie:</td>
                        <td>'.$row['codigo_serie'].'</td>
                        </tr>
                        <tr>
                        <td>tecnologia:</td>
                        <td>'.$row['tecnologia'].'</td>
                        </tr>
                        <tr>
                        <td>Modelo:</td>
                        <td>'.$row['modelo'].'</td>
                        </tr>
                        <tr>
                        <td>Error al instalar?:</td>
                        <td>'.$row['error_instalar'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     
                   
?>
</body>
</html>
<?php
  $correo = $_POST['destino'];
  $nombre = $_POST['nombre'];

  $bandera = $_POST['bandera'];

  $jefe = $_POST['cc'];
  $jefe2 = $_POST['cc2'];

//$correo = 'jhosuegarciastarkand@gmail.com';
  $dompdf1 = new DOMPDF();
  $dompdf1->set_option('enable_html5_parser', TRUE);
$dompdf1->load_Html(ob_get_clean());
$dompdf1->render();
  $filename1 = 'reporteCalidad'.$codigo1.'.pdf';

  $pdf =$dompdf1->output();
  file_put_contents($_SERVER['DOCUMENT_ROOT'].'/Hermes/enviados/calidad/'.$filename1, $pdf);
	//$archivo=$dompdf1->stream($filename1);

	$sending = new Mailer("Reporte Calidad: ".$codigo1."", "Reporte Calidad:",$filename1, $correo,$jefe,$jefe2,$nombre,"00/00");
    $resultado = $sending->enviarCorreoCalidad();
if ($resultado ==1) {
  if ($bandera=="admin") {
    header('Location: ../listas/lista_Calidad.php?success=correcto');
  }elseif($bandera=="usuario"){

    header('Location: ../listas/FichaTecnca_u.php?success=correcto');

  }
  

}
           

}


 ?>