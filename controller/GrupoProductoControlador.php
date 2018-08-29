<?php
require_once "../class/GrupoProducto.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_grupo_producto =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	
	$grupos = new GrupoProducto();
	$grupos->setNombre($nombre);
	$grupos->setDescripcion($descripcion);
	$grupos->setId_grupo_producto($id_grupo_producto);
	$update=$grupos->update();
	if ($update==true) {
		header('Location: ../listas/lista_grupo_producto.php?success=correcto&id='.$id_grupo_producto.'&nombre='.$nombre.'&descripcion='.$descripcion.'');
		# code...
	}else{
		header('Location: ../listas/lista_grupo_producto.php?error=incorrecto&id='.$id_grupo_producto.'&nombre='.$nombre.'&descripcion='.$descripcion.'');
	}

}
elseif ($accion=="eliminar") {
	$id_grupo_producto =$_GET['id'];
	$categor = new GrupoProducto();
	$categor->setId_grupo_producto($id_grupo_producto);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../listas/lista_grupo_producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_grupo_producto.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$grupo = new GrupoProducto();
	$grupo->setNombre($nombre);
	$grupo->setDescripcion($descripcion);
	$save=$grupo->save();
	if ($save==true) {
		header('Location: ../listas/lista_grupo_producto.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/lista_grupo_producto.php?error=incorrecto');
	}
}elseif ($accion=="estado") {
	$id_grupo_producto =$_POST['id'];
	$estado=$_POST['estado'];
	
	$grupo = new GrupoProducto();
	$update=$grupo->changeStatus($id_grupo_producto,$estado);
	if ($update==true) {
		header('Location: ../listas/lista_grupo_producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/lista_grupo_producto.php?error=incorrecto');
	}

}


?>