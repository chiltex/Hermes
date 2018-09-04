<?php
require_once "../class/TipoGestion.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_TipoGestion =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$TipoGestion = new TipoGestion();
	$TipoGestion->setNombre($nombre);
	$TipoGestion->setDescripcion($descripcion);
	$TipoGestion->setId_tipo_gestion($id_TipoGestion);
	$update=$TipoGestion->update();
	if ($update==true) {
		header('Location: ../listas/TipoGestion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TipoGestion.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_TipoGestion =$_GET['id'];
	$TipoGestion = new TipoGestion();
	$TipoGestion->setId_tipo_gestion($id_TipoGestion);
	$delete=$TipoGestion->delete();
	if ($delete==true) {
		header('Location: ../listas/TipoGestion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TipoGestion.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$TipoGestion = new TipoGestion();
	$TipoGestion->setNombre($nombre);
	$TipoGestion->setDescripcion($descripcion);
	$save=$TipoGestion->save();
	if ($save==true) {
		header('Location: ../listas/TipoGestion.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/TipoGestion.php?error=incorrecto');
	}
}

?>