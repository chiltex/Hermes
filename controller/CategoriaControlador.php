<?php
require_once "../class/Categorias.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_categoria =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$categoria = new Categorias();
	$categoria->setNombre($nombre);
	$categoria->setDescripcion($descripcion);
	$categoria->setId_categorias($id_categoria);
	$update=$categoria->update();
	if ($update==true) {
		header('Location: ../listas/lista_categorias.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_categorias.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_categoria =$_GET['id'];
	$categor = new Categorias();
	$categor->setId_categorias($id_categoria);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../listas/lista_categorias.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_categorias.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$categoria = new Categorias();
	$categoria->setNombre($nombre);
	$categoria->setDescripcion($descripcion);
	$save=$categoria->save();
	if ($save==true) {
		header('Location: ../listas/lista_categorias.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/lista_categorias.php?error=incorrecto');
	}
}

?>