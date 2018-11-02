<?php
require_once "../class/Contactos.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];	
	$telefono =$_POST['telefono'];
	if (isset($_POST['extension'])) {
	$extension =$_POST['extension'];
	}else{
		$extension=00;
	}
	if ($_POST['movil']) {
		$movil =$_POST['movil'];
	}else{
		$movil=0000;
	}
	$id_cliente =$_POST['id_cliente'];
	$id_contacto =$_POST['id_contacto'];
	$contactos = new Contactos();
	$contactos->setNombre($nombre);
	$contactos->setCorreo($correo);
	$contactos->setTelefono($telefono);
	$contactos->setExtension($extension);
	$contactos->setMovil($movil);		
	$contactos->setId_cliente($id_cliente);
	$contactos->setId_contacto($id_contacto);
	$update=$contactos->update();
	if ($update==true) {
		header('Location: ../listas/contactos.php?success=correcto&id=""&nombre=Seleccione un Cliente');
		# code...
	}else{
		header('Location: ../listas/contactos.php?error=incorrecto&id=""&nombre=Seleccione un Cliente');
	}

}
elseif ($accion=="eliminar") {	
	$id_contacto =$_GET['id'];

	$id_cliente =$_GET['id_cliente'];
	$nombre =$_GET['nombreC'];
	$contactos = new Contactos();
	$contactos->setId_contacto($id_contacto);
	$delete=$contactos->delete();
	if ($delete==true) {
		header('Location: ../listas/contactos.php?success=correcto&id='.$id_cliente.'&nombre="'.$nombre.'"');
		# code...
	}else{
		header('Location: ../listas/contactos.php?error=incorrecto&id=""&nombre=Seleccione un Cliente');
	}
}
elseif ($accion=="guardar") 
{	
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];	
	$telefono =$_POST['telefono'];
	if (isset($_POST['extension'])) {
	$extension =$_POST['extension'];
	}else{
		$extension=00;
	}
	if ($_POST['movil']) {
		$movil =$_POST['movil'];
	}else{
		$movil=0000;
	}
	
	$id_cliente =$_POST['id_cliente'];

	
	$nombreC =$_POST['nombreC'];
	$contactos = new Contactos();
	$contactos->setNombre($nombre);
	$contactos->setCorreo($correo);
	$contactos->setTelefono($telefono);
	$contactos->setExtension($extension);
	$contactos->setMovil($movil);		
	$contactos->setId_cliente($id_cliente);
	$save=$contactos->save();
	if ($save==true) {
		header('Location: ../listas/contactos.php?success=correcto&id='.$id_cliente.'&nombre='.$nombreC.'');
		# code...
	}
	else{
		header('Location: ../listas/contactos.php?error=incorrecto&id=""&nombre=Seleccione un Cliente');
	}
}

?>