<?php
require_once "../class/PartFailure.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_part_fail =$_POST['id'];
	$nombre=$_POST['nombre'];
	if (isset($_POST['descripcion'])) {
		$descripcion=$_POST['descripcion'];
	}else
	{
		$descripcion="No definida";
	}
	
	$fail = new PartFailure();
	$fail->setNombre($nombre);
	$fail->setDescripcion($descripcion);
	$fail->setId_part_fail($id_part_fail);
	$update=$fail->update();
	if ($update==true) {
		header('Location: ../listas/lista_PartFailure.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_PartFailure.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_part_fail =$_GET['id'];
	$fail = new PartFailure();
	$fail->setId_PartFailure($id_part_fail);
	$delete=$fail->delete();
	if ($delete==true) {
		header('Location: ../listas/lista_PartFailure.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_PartFailure.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
	if (isset($_POST['descripcion'])) {
		$descripcion=$_POST['descripcion'];
	}else
	{
		$descripcion="No definida";
	}

	# code...
	$fail = new PartFailure();
	$fail->setNombre($nombre);
	$fail->setDescripcion($descripcion);
	$save=$fail->save();
	if ($save==true) {
		header('Location: ../listas/lista_PartFailure.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/lista_PartFailure.php?error=incorrecto');
	}
}

?>