<?php
require_once "../class/Repuestos.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$descripcion =$_POST['descripcion'];
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];	
	$id_repuesto =$_POST['id'];
	$Repuestos = new Repuestos();
	$Repuestos->setNombre($nombre);
	$Repuestos->setCodigo_Serie($codigo_serie);
	$Repuestos->setdescripcion($descripcion);	
	$Repuestos->setId_repuesto($id_repuesto);
	$update=$Repuestos->update();
	if ($update==true) {
		header('Location: ../listas/Repuestos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Repuestos.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_repuestos =$_GET['id'];
	$Repuestos = new Repuestos();
	$Repuestos->setId_repuesto($id_repuestos);
	$delete=$Repuestos->delete();
	if ($delete==true) {
		header('Location: ../listas/Repuestos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Repuestos.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	$descripcion =$_POST['descripcion'];
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];
	$Repuestos = new Repuestos();
	$Repuestos->setNombre($nombre);
	$Repuestos->setCodigo_Serie($codigo_serie);
	$Repuestos->setdescripcion($descripcion);	
	$save=$Repuestos->save();
	if ($save==true) {
		header('Location: ../listas/Repuestos.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Repuestos.php?error=incorrecto');
	}
}
elseif ($accion=="change") 
{	
	$codigo =$_GET['id'];
	$estado=$_GET['estado'];

	$Repuestos = new Repuestos();
	if ($estado=="Activo") {
		$NEstado="Desactivado";
		$save=$Repuestos->changeStatus($codigo,$NEstado);
	}else{

		$NEstado="Activo";
		$save=$Repuestos->changeStatus($codigo,$NEstado);

	}	
	
	if ($save==true) {
		header('Location: ../listas/Repuestos.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Repuestos.php?error=incorrecto');
	}
}

?>