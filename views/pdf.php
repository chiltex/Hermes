<?php 
ob_start();

include "../views/selectFTPDF.php";
$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->render();
$dompdf->stream();

 ?>