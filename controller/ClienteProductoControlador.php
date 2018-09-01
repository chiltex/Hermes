<?php
require_once "../class/ClienteProducto.php";
require_once "../class/Cliente.php";

$accion=$_GET['accion'];

if ($accion=="eliminar") {
	$cliente=$_GET['cliente'];
	$id =$_GET['id'];
	$cp = new ClienteProducto();
	$cp->setId_cliente_producto($id);
	$delete=$cp->delete();

	$misClientes = new Cliente();
         $cliente = $misClientes->selectOne($cliente);
	if ($delete==true) {
		foreach ((array)$cliente as $row){

		header('Location: ../listas/Cliente_Producto.php?success=correcto&cliente='.$row["id_cliente"].'&nombre='.$row["nombre"].'');
		}
		# code...
	}
	else{
		foreach ((array)$cliente as $row){
		header('Location: ../listas/Cliente_Producto.php?error=incorrecto&cliente='.$row["id_cliente"].'&nombre='.$row["nombre"].'');
		}
	}
}
elseif ($accion=="guardar") 
{
	$cliente=$_GET['cliente'];
$producto=$_GET['producto'];

	# code...
	$cp = new ClienteProducto();
	$cp->setId_cliente($cliente);
	$cp->setId_producto($producto);
	$save=$cp->save();

		$misClientes = new Cliente();
         $cliente = $misClientes->selectOne($cliente);
	if ($save==true) {
		foreach ((array)$cliente as $row){

		header('Location: ../listas/Cliente_Producto.php?success=correcto&cliente='.$row["id_cliente"].'&nombre='.$row["nombre"].'');
		}
		# code...
	}
	else{
		foreach ((array)$cliente as $row){
		header('Location: ../listas/Cliente_Producto.php?error=incorrecto&cliente='.$row["id_cliente"].'&nombre='.$row["nombre"].'');
		}
	}
}

?>