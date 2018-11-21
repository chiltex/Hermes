<?php
require_once "class/Events.php";

$accion=$_GET['accion'];
$accion1=$_POST['accion'];

if ($accion=="modificar") {
	$descripcion =$_POST['descripcion'];
	$tittle=$_POST['tittle'];
	$color=$_POST['color'];	
	$id =$_POST['id'];

	$idu = $_POST['id_usuario'];
	$nombre = $_POST['nu'];
	$Events = new Events();
	$Events->setTittle($tittle);
	$Events->setColor($color);
	$Events->setDescripcion($descripcion);	
	$Events->setId($id);
	$update=$Events->update();
	if ($update==true) {
		header('Location: indexAdmin.php?success=correcto&id='.$idu.'&nombre='.$nombre.'');
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
	$id1 = $_POST['id_usuario1'];
	$id = $_POST['id_usuario'];
	$id_ticket=NULL;
	$nombre = $_POST['nu'];
	$Events = new Events();
	$Events->setTittle($tittle);
	$Events->setStar($start);	
	$Events->setEnd($end);	
	$Events->setColor($color);
	$Events->setDescripcion($descripcion);
	$Events->setId_usuario($id);
	$save=$Events->save();
	if ($save==true) {
		header('Location: indexAdmin.php?success=correcto&id='.$id1.'&nombre='.$nombre.'');
		# code...
	}
	else{
		header('Location: indexAdmin.php?error=incorrecto&tittle='.$tittle.'&color='.$color.'&descripcion='.$descripcion.'');
	}
}
elseif($accion=="date") {
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];
	$idu = $_POST['id_usuario'];
	$nombre = $_POST['nu'];
	$Events = new Events();
	$Events->setStar($start);	
	$Events->setEnd($end);	
	$Events->setId($id);
	$update=$Events->updateDate();
	if ($update==true) {
		header('Location: indexAdmin.php?success=correcto&id='.$idu.'&nombre='.$nombre.'');
		# code...
	}else{
		header('Location: indexAdmin.php?error=incorrecto');
	}




}

if (isset($_POST['eliminar']) && isset($_POST['id'])){
	$ids =$_POST['id'];
	$idu = $_POST['id_usuario'];
	$nombre = $_POST['nu'];
	$Events = new Events();
	$Events->setId($id);
	$delete=$Events->delete();
	if ($delete==true) {
		header('Location: indexAdmin.php?success=correcto&id='.$id.'&nombre='.$nombre.'');
		# code...
	}else{
		header('Location: indexAdmin.php?error=incorrecto');
	}

}


?>