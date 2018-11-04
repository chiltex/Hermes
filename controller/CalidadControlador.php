<?php
require_once "../class/Calidad.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_reporte_calidad =$_POST['id'];
	$cliente=$_POST['cliente'];
	$pais=$_POST['pais'];
	$anio=$_POST['anio'];
	$mes=$_POST['mes'];
	$instalado_por=$_POST['instalado_por'];
	$codigo_serie=$_POST['codigo_serie'];
	if (isset($_POST['tecnologia'])) {
		
		if ($_POST['tecnologia']=="otro") {
			$tecnologia= $_POST['otro'];
		}else
		{

		$tecnologia=$_POST['tecnologia'];
		}

	}
	else{
		$tecnologia=="N/A";
	}

	$modelo=$_POST['modelo'];
	$error_instalar=$_POST['error_instalar'];
	$Calidad = new Calidad();
	$Calidad->setCliente($cliente);
	$Calidad->setPais($pais);
	$Calidad->setId_reporte_calidad($id_reporte_calidad);
	$Calidad->setAnio($anio);
	$Calidad->setMes($mes);
	$Calidad->setInstalado_por($instalado_por);
	$Calidad->setCodigo_serie($codigo_serie);
	$Calidad->setTecnologia($tecnologia);
	$Calidad->setModelo($modelo);
	$Calidad->setError_instalar($error_instalar);
	$update=$Calidad->update();
	if ($update==true) {
		header('Location: ../listas/lista_Calidad.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_Calidad.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_reporte_calidad =$_GET['id'];
	$categor = new Calidad();
	$categor->setId_reporte_calidad($id_reporte_calidad);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../listas/lista_Calidad.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_Calidad.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$cliente=$_POST['cliente'];
	$pais=$_POST['pais'];
	$anio=$_POST['anio'];
	$mes=$_POST['mes'];
	$instalado_por=$_POST['instalado_por'];
	$codigo_serie=$_POST['codigo_serie'];
	$modelo=$_POST['modelo'];
	$error_instalar=$_POST['error_instalar'];
	if (isset($_POST['tecnologia'])) {
		
		if ($_POST['tecnologia']=="otro") {
			$tecnologia= $_POST['otro'];
		}else
		{

		$tecnologia=$_POST['tecnologia'];
		}

	}
	# code...
	$Calidad = new Calidad();
	$Calidad->setCliente($cliente);
	$Calidad->setPais($pais);
	$Calidad->setAnio($anio);
	$Calidad->setMes($mes);
	$Calidad->setInstalado_por($instalado_por);
	$Calidad->setCodigo_serie($codigo_serie);
	$Calidad->setTecnologia($tecnologia);
	$Calidad->setModelo($modelo);
	$Calidad->setError_instalar($error_instalar);
	$save=$Calidad->save();
	if ($save==true) {
		header('Location: ../listas/lista_Calidad.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/lista_Calidad.php?error=incorrecto');
	}
}

?>