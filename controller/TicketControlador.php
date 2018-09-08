<?php
require_once "../class/Ticket.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$descripcion=$_POST['descripcion'];
	$estado=$_POST['estado'];	
	$id_cliente =$_POST['id_cliente'];	
	$id_contacto =$_POST['id_contacto'];
	$id_producto =$_POST['id_producto'];	
	$id_usuario =$_POST['id_usuario'];		
	$id_gestion =$_POST['id_gestion'];	
	$id_tipo_gestion =$_POST['id_tipo_gestion'];	
	$id_ficha_tecnica =$_POST['id_ficha_tecnica'];
	$solucion=$_POST['solucion'];
	$id_ticket =$_POST['id_ticket'];
	$Ticket = new Ticket();
	$Ticket->setDescripcion($descripcion);
	$Ticket->setEstado($estado);
	$Ticket->setId_cliente($id_cliente);
	$Ticket->setId_contacto($id_contacto);
	$Ticket->setId_producto($id_producto);
	$Ticket->setId_usuario($id_usuario);	
	$Ticket->setId_gestion($id_gestion);
	$Ticket->setId_tipo_gestion($id_tipo_gestion);
	$Ticket->setId_ficha_tecnica($id_ficha_tecnica);
	$Ticket->setSolucion($solucion);	
	$Ticket->setId_ticket($id_ticket);
	$update=$Ticket->update();
	if ($update==true) {
		header('Location: ../listas/Tickets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Tickets.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_Ticket =$_GET['id'];
	$Ticket = new Ticket();
	$Ticket->setId_Ticket($id_Ticket);
	$delete=$Ticket->delete();
	if ($delete==true) {
		header('Location: ../listas/Tickets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Tickets.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	$descripcion=$_POST['descripcion'];
	$estado=$_POST['estado'];	
	$id_cliente =$_POST['id_cliente'];	
	$id_contacto =$_POST['id_contacto'];
	$id_producto =$_POST['id_producto'];	
	$id_usuario =$_POST['id_usuario'];		
	$id_gestion =$_POST['id_gestion'];	
	$id_tipo_gestion =$_POST['id_tipo_gestion'];	
	$id_ficha_tecnica =$_POST['id_ficha_tecnica'];
	$solucion=$_POST['solucion'];	
	$Ticket = new Ticket();
	$Ticket->setDescripcion($descripcion);
	$Ticket->setEstado($estado);
	$Ticket->setId_cliente($id_cliente);
	$Ticket->setId_contacto($id_contacto);
	$Ticket->setId_producto($id_producto);
	$Ticket->setId_usuario($id_usuario);	
	$Ticket->setId_gestion($id_gestion);
	$Ticket->setId_tipo_gestion($id_tipo_gestion);
	$Ticket->setId_ficha_tecnica($id_ficha_tecnica);
	$Ticket->setSolucion($solucion);	
	$save=$Ticket->save();
	if ($save==true) {
		header('Location: ../listas/Tickets.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Tickets.php?error=incorrecto&producot='.$id_producto.'&cliente='.$id_cliente.'&id_contacto='.$id_contacto.'');
	}
}

?>