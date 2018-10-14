<?php
require_once "../class/TipoUsuario.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_TipoUsuario =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$TipoUsuario = new TipoUsuario();
	$TipoUsuario->setNombre($nombre);
	$TipoUsuario->setDescripcion($descripcion);
	$TipoUsuario->setId_tipo_usuario($id_TipoUsuario);
	$update=$TipoUsuario->update();
	if ($update==true) {
		header('Location: ../listas/TipoUsuario.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TipoUsuario.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_TipoUsuario =$_GET['id'];
	$TipoUsuario = new TipoUsuario();
	$TipoUsuario->setId_tipo_usuario($id_TipoUsuario);
	$delete=$TipoUsuario->delete();
	if ($delete==true) {
		header('Location: ../listas/TipoUsuario.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TipoUsuario.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$TipoUsuario = new TipoUsuario();
	$TipoUsuario->setNombre($nombre);
	$TipoUsuario->setDescripcion($descripcion);
	$save=$TipoUsuario->save();
	if ($save==true) {
		header('Location: ../listas/TipoUsuario.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/TipoUsuario.php?error=incorrecto');
	}
}

?>