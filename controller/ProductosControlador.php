<?php
require_once "../class/Productos.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_grupo_producto =$_POST['id_grupo_producto'];
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];	
	$id_producto =$_POST['id'];
	$Productos = new Productos();
	$Productos->setNombre($nombre);
	$Productos->setCodigo_Serie($codigo_serie);
	$Productos->setId_grupo_producto($id_grupo_producto);	
	$Productos->setId_Producto($id_producto);
	$update=$Productos->update();
	if ($update==true) {
		header('Location: ../listas/Productos.php?success=correcto&codigo_serie='.$codigo_serie.'');
		# code...
	}else{
		header('Location: ../listas/Productos.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_Productos =$_GET['id'];
	$Productos = new Productos();
	$Productos->setId_producto($id_Productos);
	$delete=$Productos->delete();
	if ($delete==true) {
		header('Location: ../listas/Productos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Productos.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	$id_grupo_producto =$_POST['id_grupo_producto'];
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];
	$Productos = new Productos();
	$Productos->setNombre($nombre);
	$Productos->setCodigo_Serie($codigo_serie);
	$Productos->setId_grupo_producto($id_grupo_producto);	
	$save=$Productos->save();
	if ($save==true) {
		header('Location: ../listas/Productos.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Productos.php?error=incorrecto');
	}
}
elseif ($accion=="change") 
{	
	$codigo =$_GET['id'];
	$estado=$_GET['estado'];

	$Productos = new Productos();
	if ($estado=="Activo") {
		$NEstado="Desactivado";
		$save=$Productos->changeStatus($codigo,$NEstado);
	}else{

		$NEstado="Activo";
		$save=$Productos->changeStatus($codigo,$NEstado);

	}	
	
	if ($save==true) {
		header('Location: ../listas/Productos.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Productos.php?error=incorrecto');
	}
}

?>