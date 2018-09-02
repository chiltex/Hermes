<?php
require_once "class/Events.php";

$accion=$_GET['accion'];
$accion1=$_POST['accion'];

if ($accion=="modificar") {
	$descripcion =$_POST['descripcion'];
	$tittle=$_POST['tittle'];
	$color=$_POST['color'];	
	$id =$_POST['id'];
	$Events = new Events();
	$Events->setTittle($tittle);
	$Events->setColor($color);
	$Events->setDescripcion($descripcion);	
	$Events->setId($id);
	$update=$Events->update();
	if ($update==true) {
		header('Location: indexAdmin.php?success=correcto');
		# code...
	}else{
		header('Location: indexAdmin.php?error=incorrecto');
	}

}

elseif ($accion=="guardar") 
{	
	$descripcion =$_POST['descripcion'];
	$tittle=$_POST['tittle'];
	$color=$_POST['color'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$Events = new Events();
	$Events->setTittle($tittle);
	$Events->setStar($start);	
	$Events->setEnd($end);	
	$Events->setColor($color);
	$Events->setDescripcion($descripcion);
	$save=$Events->save();
	if ($save==true) {
		header('Location: indexAdmin.php?success=correcto');
		# code...
	}
	else{
		header('Location: indexAdmin.php?error=incorrecto&tittle='.$tittle.'&color='.$color.'&descripcion='.$descripcion.'');
	}
}
if (isset($_POST['eliminar']) && isset($_POST['id'])){
	$ids =$_POST['id'];
	$Events = new Events();
	$Events->setId($id);
	$delete=$Events->delete();
	if ($delete==true) {
		header('Location: indexAdmin.php?success=correcto');
		# code...
	}else{
		header('Location: indexAdmin.php?error=incorrecto');
	}

}


?>