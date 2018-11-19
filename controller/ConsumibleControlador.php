<?php
require_once "../class/Consumibles.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$descripcion =$_POST['descripcion'];
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];	
	$id_repuesto =$_POST['id'];
	$Consumibles = new Consumibles();
	$Consumibles->setNombre($nombre);
	$Consumibles->setCodigo_Serie($codigo_serie);
	$Consumibles->setdescripcion($descripcion);	
	$Consumibles->setId_consumible($id_repuesto);
	$update=$Consumibles->update();
	if ($update==true) {
		header('Location: ../listas/Consumibles.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Consumibles.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_consumible =$_GET['id'];
	$Consumibles = new Consumibles();
	$Consumibles->setId_consumible($id_consumible);
	$delete=$Consumibles->delete();
	if ($delete==true) {
		header('Location: ../listas/Consumibles.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Consumibles.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	if (isset($_POST['descripcion'])) {
		$descripcion =$_POST['descripcion'];
	}
	else
	{
		$descripcion = "N/A";
	}
	$nombre=$_POST['nombre'];
	$codigo_serie=$_POST['codigo_serie'];

	$Consumibles = new Consumibles();
	$Consumibles->setNombre($nombre);
	$Consumibles->setCodigo_Serie($codigo_serie);
	$Consumibles->setdescripcion($descripcion);	
	$save=$Consumibles->save();
	if ($save==true) {
		header('Location: ../listas/Consumibles.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Consumibles.php?error=incorrecto');
	}
}
elseif ($accion=="change") 
{	
	$codigo =$_GET['id'];
	$estado=$_GET['estado'];

	$Consumibles = new Consumibles();
	if ($estado=="Activo") {
		$NEstado="Desactivado";
		$save=$Consumibles->changeStatus($codigo,$NEstado);
	}else{

		$NEstado="Activo";
		$save=$Consumibles->changeStatus($codigo,$NEstado);

	}	
	
	if ($save==true) {
		header('Location: ../listas/Consumibles.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Consumibles.php?error=incorrecto');
	}
}

?>