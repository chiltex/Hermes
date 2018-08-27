<?php
require_once "../class/Cliente.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_tip_cli =$_POST['id_tip_cli'];
	$id_categoria =$_POST['id_categoria'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];	
	$id_cliente =$_POST['id_cliente'];
	$cliente = new Cliente();
	$cliente->setNombre($nombre);
	$cliente->setDireccion($direccion);
	$cliente->setId_categoria($id_categoria);
	$cliente->setId_tip_cli($id_tip_cli);	
	$cliente->setId_cliente($id_cliente);
	$update=$cliente->update();
	if ($update==true) {
		header('Location: ../listas/clientes.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/clientes.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_cliente =$_GET['id'];
	$cliente = new Cliente();
	$cliente->setId_cliente($id_cliente);
	$delete=$cliente->delete();
	if ($delete==true) {
		header('Location: ../listas/clientes.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/clientes.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	$id_tip_cli =$_POST['id_tip_cli'];
	$id_categoria =$_POST['id_categoria'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$cliente = new Cliente();
	$cliente->setNombre($nombre);
	$cliente->setDireccion($direccion);
	$cliente->setId_categoria($id_categoria);
	$cliente->setId_tip_cli($id_tip_cli);	
	$save=$cliente->save();
	if ($save==true) {
		header('Location: ../listas/clientes.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/clientes.php?error=incorrecto');
	}
}

?>