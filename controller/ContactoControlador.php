<?php
require_once "../class/Contactos.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];	
	$telefono =$_POST['telefono'];
	$extension =$_POST['extension'];
	$movil =$_POST['movil'];
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
	$contactos = new Contactos();
	$contactos->setId_contacto($id_contacto);
	$delete=$contactos->delete();
	if ($delete==true) {
		header('Location: ../listas/contactos.php?success=correcto&id=""&nombre=Seleccione un Cliente');
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
	$extension =$_POST['extension'];
	$movil =$_POST['movil'];
	$id_cliente =$_POST['id_cliente'];
	$contactos = new Contactos();
	$contactos->setNombre($nombre);
	$contactos->setCorreo($correo);
	$contactos->setTelefono($telefono);
	$contactos->setExtension($extension);
	$contactos->setMovil($movil);		
	$contactos->setId_cliente($id_cliente);
	$save=$contactos->save();
	if ($save==true) {
		header('Location: ../listas/contactos.php?success=correcto&id=""&nombre=Seleccione un Cliente');
		# code...
	}
	else{
		header('Location: ../listas/contactos.php?error=incorrecto&id=""&nombre=Seleccione un Cliente');
	}
}

?>