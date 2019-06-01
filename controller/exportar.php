<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */



if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
//require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
require_once "Classes/PHPExcel.php";
// Crear nuevo objeto PHPExcel
$accion = $_POST['accion'];
 
 if ($accion == 'todos_ticket') {

 	$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Hermes Guatemala")
							 ->setLastModifiedBy("Hermes")
							 ->setTitle("Office 2010 XLSX Documento de prueba")
							 ->setSubject("Office 2010 XLSX Documento de prueba")
							 ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de prueba");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:H1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tickets')
            ->setCellValue('A2', 'CODIGO')
            ->setCellValue('B2', 'TIPO')
            ->setCellValue('C2', 'GESTION')
      			->setCellValue('D2', 'RESPONSABLE')
      			->setCellValue('E2', 'ASIGNADO POR')
      			->setCellValue('F2', 'ESTADO')
            ->setCellValue('G2', 'URGENTE')
            ->setCellValue('H2', 'CREADO');
			
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray($boldArray);		

	
			
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);  		
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);  

/*Extraer datos de MYSQL*/

	require_once "../class/Ticket.php";
                         $misTickets = new Ticket();
                         $Ticket = $misTickets->selectALL1();
                        
                         $cel=3;
                         foreach ((array)$Ticket as $row) {
                          $tipo=$misTickets->selectOneTG($row['id_tipo_gestion']);
                          $tecnico=$misTickets->selectOneU($row['id_usuario']);
                          $jefe=$misTickets->selectOneU($row['id_jefe']);
                      $codigo= $row['id_ticket'];
                           
                            foreach ($tipo as $rew) {
                       $tipo= $rew['nombre'];
                       $gestion= $rew['gestions'];
                            }
                         foreach ($tecnico as $field) {
                     $responsable=  $field['nombre'];
                            }
                            if($row['id_jefe']  == NULL){
                       $asignado_por='';
                            }
                            else{
                            foreach ($jefe as $field1) {
                              
                     $asignado_por= $field1['nombre'];
                            }
                            }
                     $estado= $row['estado'];

                      $urgente= $row['urgente'];
                           if($row['fecha_creacion'] == NULL){
                     $fecha_creacion = ''; 
                           }else{
                          $fecha_creacion=$row['fecha_creacion'];
                           }
                           $a="A".$cel;
                            $b="B".$cel;
                            $c="C".$cel;
                            $d="D".$cel;
                            $e="E".$cel;
                            $f="F".$cel;
                            $g="G".$cel;
                            $h="H".$cel;
                            // Agregar datos
                            $objPHPExcel->setActiveSheetIndex(0)
                                  ->setCellValue($a, $codigo)
                                  ->setCellValue($b, $tipo)
                                  ->setCellValue($c, $gestion)
                                  ->setCellValue($d, $responsable)
                            ->setCellValue($e, $asignado_por)
                            ->setCellValue($f, $estado)
                            ->setCellValue($g, $urgente)
                            ->setCellValue($h, $fecha_creacion);
        $cel+=1;
                   
                       }


/*	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'hermes');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$sql="SELECT * FROM ticket ORDER BY urgente DESC";
	$query=mysqli_query($con,$sql);
	$cel=3;//Numero de fila donde empezara a crear  el reporte
	while ($row=mysqli_fetch_array($query)){
		$codigo=$row['id_ticket'];
		$countryName=$row['countryName'];
		$currencyCode=$row['currencyCode'];
		$capital=$row['capital'];
		$continentName=$row['continentName'];
		
			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;
			$d="D".$cel;
			$e="E".$cel;
			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $codigo)
            ->setCellValue($b, $countryName)
            ->setCellValue($c, $currencyCode)
            ->setCellValue($d, $capital)
			->setCellValue($e, $continentName);
			
	$cel+=1;
	}*/

/*Fin extracion de datos MYSQL*/
$rango="A2:$h";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte de tickets');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tickets_'.date('dmY') .'.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

}
elseif ($accion = 'events_mensuales') {
$mes=$_POST['mes'];
$año = date("Y");
$nombre_mes = '';
  if ($mes=='01') {
  $nombre_mes = 'Enero';
  }elseif ($mes=='02') {
  $nombre_mes = 'Febrero';
  }elseif ($mes=='03') {
  $nombre_mes = 'Marzo';
  }elseif ($mes=='04') {
  $nombre_mes = 'Abril';
  }elseif ($mes=='05') {
  $nombre_mes = 'Mayo';
  }elseif ($mes=='06') {
  $nombre_mes = 'Junio';
  }elseif ($mes=='07') {
  $nombre_mes = 'Julio';
  }elseif ($mes=='08') {
  $nombre_mes = 'Agosto';
  }elseif ($mes=='09') {
  $nombre_mes = 'Septiembre';
  }elseif ($mes=='10') {
  $nombre_mes = 'Octubre';
  }elseif ($mes=='11') {
  $nombre_mes = 'Noviembre';
  }elseif ($mes=='12') {
  $nombre_mes = 'Diciembre';
  }
  $objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Hermes Guatemala")
               ->setLastModifiedBy("Hermes")
               ->setTitle("Office 2010 XLSX Documento de prueba")
               ->setSubject("Office 2010 XLSX Documento de prueba")
               ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
               ->setKeywords("office 2010 openxml php")
               ->setCategory("Archivo con resultado de prueba");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:H1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Citas del mes de '.$nombre_mes.' de '.$año)
            ->setCellValue('A2', 'CODIGO')
            ->setCellValue('B2', 'ASUNTO')
            ->setCellValue('C2', 'COLOR')
            ->setCellValue('D2', 'FECHA')
            ->setCellValue('E2', 'DESCRIPCION')
            ->setCellValue('F2', 'RESPONSABLE')
            ->setCellValue('G2', 'TICKET')
            ->setCellValue('H2', 'EMPRESA');
      
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray($boldArray);    

  
      
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8); 
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);  
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);  
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);      
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);  

/*Extraer datos de MYSQL*/

  require_once "../class/Ticket.php";
  require_once "../class/Events1.php";

                         $eventos = new Events();
                         $misTickets = new Ticket();
                         $listEventos = $eventos->selectMonthEvents($mes,$año);
                         $cel=3;
                         foreach ($listEventos as $evento) {
                            $Ticket = $misTickets->selectOne($evento['id_ticket']);
                            $codigo = $evento['id'];
                            $asunto = $evento['title'];
                            $color  = $evento['color'];
                            $fecha  = $evento['start'];
                            $descripcion = $evento['descripcion'];

                            foreach ((array)$Ticket as $row) {
                              $tecnico=$misTickets->selectOneU($row['id_usuario']);
                              $cliente = $misTickets->selectOneCliente($row['id_cliente']);
                               foreach ($tecnico as $field) {
                                  $responsable=  $field['nombre'];
                                  }
                             $id_ti = $evento['id_ticket'];
                               foreach ($cliente as $f) {
                                  $empresa=  $f['nombre'];
                                  }  

                            }

                            $a="A".$cel;
                            $b="B".$cel;
                            $c="C".$cel;
                            $d="D".$cel;
                            $e="E".$cel;
                            $f="F".$cel;
                            $g="G".$cel;
                            $h="H".$cel;
                            // Agregar datos
                            $objPHPExcel->setActiveSheetIndex(0)
                                  ->setCellValue($a, $codigo)
                                  ->setCellValue($b, $asunto)
                                  ->setCellValue($c, $color)
                                  ->setCellValue($d, $fecha)
                                  ->setCellValue($e, $descripcion)
                                  ->setCellValue($f, $responsable)
                                  ->setCellValue($g, $id_ti)
                                  ->setCellValue($h, $empresa);
        $cel+=1;

                         }
                        
  
/*Fin extracion de datos MYSQL*/
$rango="A2:$h";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle($mes.'-'.$año);


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="citas_'.$nombre_mes.'.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

}
?>
