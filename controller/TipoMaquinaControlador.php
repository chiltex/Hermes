<?php
require_once "../class/TipoMaquina.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_tipo_maquina =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$categoria = new TipoMaquina();
	$categoria->setNombre($nombre);
	$categoria->setDescripcion($descripcion);
	$categoria->setId_tipo_maquina($id_tipo_maquina);
	$update=$categoria->update();
	if ($update==true) {
		header('Location: ../listas/lista_TipoMaquina.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_TipoMaquina.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_tipo_maquina =$_GET['id'];
	$categor = new TipoMaquina();
	$categor->setId_tipo_maquina($id_tipo_maquina);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../listas/lista_TipoMaquina.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_TipoMaquina.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$categoria = new TipoMaquina();
	$categoria->setNombre($nombre);
	$categoria->setDescripcion($descripcion);
	$save=$categoria->save();
	if ($save==true) {
		header('Location: ../listas/lista_TipoMaquina.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/lista_TipoMaquina.php?error=incorrecto');
	}
}

?>