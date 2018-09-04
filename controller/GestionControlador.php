<?php
require_once "../class/Gestion.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_Gestion =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$Gestion = new Gestion();
	$Gestion->setNombre($nombre);
	$Gestion->setDescripcion($descripcion);
	$Gestion->setId_gestion($id_Gestion);
	$update=$Gestion->update();
	if ($update==true) {
		header('Location: ../listas/Gestion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Gestion.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Gestion =$_GET['id'];
	$Gestion = new Gestion();
	$Gestion->setId_gestion($id_Gestion);
	$delete=$Gestion->delete();
	if ($delete==true) {
		header('Location: ../listas/Gestion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Gestion.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$Gestion = new Gestion();
	$Gestion->setNombre($nombre);
	$Gestion->setDescripcion($descripcion);
	$save=$Gestion->save();
	if ($save==true) {
		header('Location: ../listas/Gestion.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Gestion.php?error=incorrecto');
	}
}

?>