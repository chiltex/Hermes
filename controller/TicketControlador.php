<?php
require_once "../class/Ticket.php";
require_once "../class/Cliente.php";
require_once "../class/Contactos.php";
require_once "../class/Events1.php";
 require_once '../class/Mailer.php';
require_once "../class/Usuario.php";

require_once "../class/Productos.php";
$accion=$_GET['accion'];

if ($accion=="modificar") {
	if(isset($_POST['urgente']))
	{
		$urgente=$_POST['urgente'];
	}
	else{
		$urgente="No";
		}
	$descripcion=$_POST['descripcion'];
	$estado=$_POST['estado'];
	$fecha =$_POST['fecha'];
	$id_cliente =$_POST['id_cliente'];	
	$id_contacto =$_POST['id_contacto'];
	$id_producto =$_POST['id_producto'];	
	$id_usuario =$_POST['id_usuario'];		
	$id_gestion =$_POST['id_gestion'];	
	$id_tipo_gestion =$_POST['id_tipo_gestion'];	
	$id_ficha_tecnica =$_POST['id_ficha_tecnica'];
	$solucion=$_POST['solucion'];
	if (isset($_POST['fecha'])) {
		
	$fecha =$_POST['fecha'];
	}else{
	$fecha = '00/00/0000';	
	}

	if (isset($_POST['hora_solucion'])) {
		$hora_solucion =$_POST['hora_solucion'];
	}else{
		$hora_solucion ="00:00:00";
	}
	$id_ticket =$_POST['id_ticket'];
	if (isset($_POST['bandera'])) {
		$bandera = $_POST['bandera'];
	}
	else{
		$bandera = "ticket";
	}
	$Ticket = new Ticket();
	$Ticket->setDescripcion($descripcion);
	$Ticket->setEstado($estado);
	$Ticket->setId_cliente($id_cliente);
	$Ticket->setId_contacto($id_contacto);
	$Ticket->setId_producto($id_producto);
	$Ticket->setId_usuario($id_usuario);
	$Ticket->setId_tipo_gestion($id_tipo_gestion);
	$Ticket->setId_ficha_tecnica($id_ficha_tecnica);
	$Ticket->setSolucion($solucion);	
	$Ticket->setId_ticket($id_ticket);
	$Ticket->setUrgente($urgente);	
	$update=$Ticket->update();
	if ($update==true) {
			$Events = new Events();

	if ($fecha!='00/00/0000') {
		if ($hora_solucion=="00:00:00") {
	$start = $fecha.' 00:00:00';
	$end= $nuevo_end.' 00:00:00';
	}else{
	$start = $fecha.' '.$hora_solucion;
	$end= $nuevo_end.' 00:00:00';
	}
	$Events->setStar($start);	
	$Events->setEnd($end);	
	$Events->setId_ticket($id_ticket);
	$update=$Events->updateDate1();
				 $contac = new Contactos();
		 $clien = new Cliente();
		 $usuar = new Usuario();
		 $prd = new Productos();
		 $datosContactos = $contac->selectOne($id_contacto);
		 $datosClientes = $clien->selectOne($id_cliente);
		 $datosUsuarios = $usuar->selectOne($id_usuario);
		 $datosProductos = $prd->selectOne($id_producto);
		 foreach ($datosContactos as $value) {
		 	$nombreContacto = $value['nombre'];
		 	$correoContacto = $value['correo'];
		 	$movilContacto = $value['movil'];
		 }
		 foreach ($datosClientes as $value1) {
		 	$nombreCliente = $value1['nombre'];
		 }
		 foreach ($datosUsuarios as $value2) {
		 	$nombreUsuario = $value2['nombre'];
		 	$correoUsuario = $value2['correo'];
		 }
		 foreach ($datosProductos as $value3) {
		 	$nombreProducto = $value3['nombre'];
		 }
		 $asunto = "Ticket asignado: ".$id_ticket."";
		 $mensaje = "Estimado ".$nombreUsuario.", se le asignado el Ticket con Correlativo: ".$id_ticket." correspondiente a la empresa: <br>
				<strong>".$nombreCliente."<strong> <br> con los datos de contacto: <br>
				<table class='table table-bordered'>
					<tr>
						<td>Nombre de contacto: </td><td>".$nombreContacto."</td>
					</tr>
					<tr>
						<td>Correo de contacto: </td><td>".$correoContacto."</td>
					</tr>
					<tr>
						<td>Numero de contacto: </td><td>".$movilContacto."</td>
					</tr>
				</table>
				<br>
				<p>El equipo: <strong>".$nombreProducto."</strong></p>
				<p>Presenta la siguiente falla:</p>
				<p>".$descripcion."</p>
				<p><strong>Fecha Cita: ".$star.", Hora citada: ".$hora_solucion."</strong></p><br>
				<p>Cualquier consulta ingrese al sitio o comuniquese con su jefe, Muchas gracias.</p>";
	$sending = new Mailer($asunto,$mensaje,"",$correoUsuario,"","","","",$nombreUsuario,"");
		$resultado = $sending->enviarCorreoTicket();
	} // end if fecha valida
	
		if ($bandera=="ticket_u") {
			
		header('Location: ../listas/Tickets_u.php?success=correcto&urgente='.$urgente.'');
		}
		else{
		header('Location: ../listas/Tickets.php?success=correcto&urgente='.$urgente.'');

		}
		# code...
	}else{
		header('Location: ../listas/Tickets.php?error=incorrecto&urgente='.$urgente.'');
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
	if(isset($_POST['urgente']))
	{
		$urgente=$_POST['urgente'];
	}
	else{
		$urgente="No";
		}
	$descripcion=$_POST['descripcion'];
	$estado=$_POST['estado'];	
	$id_cliente =$_POST['id_cliente'];	
	$id_contacto =$_POST['id_contacto'];
	$id_producto =$_POST['id_producto'];	
	$id_usuario =$_POST['id_usuario'];		
	$id_gestion =$_POST['id_gestion'];	
	$id_jefe =$_POST['id_jefe'];		
	$nombre_empresa =$_POST['nombre_empresa'];

	if (isset($_POST['fecha'])) {
		
	$fecha =$_POST['fecha'];
	}else{
	$fecha = '00/00/0000';	
	}
	if (isset($_POST['hora_solucion'])) {
		$hora_solucion =$_POST['hora_solucion'];
	}else{
		$hora_solucion ="00:00:00";
	}
			
	$id_tipo_gestion =$_POST['id_tipo_gestion'];		
	$id_ficha_tecnica =NULL;
	$solucion="Escriba la solucion al problema...";	
	$Ticket = new Ticket();
	$Ticket->setDescripcion($descripcion);
	$Ticket->setEstado($estado);
	$Ticket->setId_cliente($id_cliente);
	$Ticket->setId_contacto($id_contacto);
	$Ticket->setId_producto($id_producto);
	$Ticket->setId_usuario($id_usuario);
	$Ticket->setId_tipo_gestion($id_tipo_gestion);
	$Ticket->setId_ficha_tecnica($id_ficha_tecnica);
	$Ticket->setSolucion($solucion);
	$Ticket->setUrgente($urgente);	
	$Ticket->setId_jefe($id_jefe);
	$save=$Ticket->save();
$tl1=$Ticket->selectLast();
	foreach ($tl1 as $key) {
		$id_nt1=$key['id_ticket'];
		}
	$lastT=$id_nt1;
	//-------------------------------------------------------------------------------------//
	if ($save==true) {
if ($fecha !='00/00/0000') {
	$tittle="T: ".$lastT." Visita a:".$nombre_empresa."";
	$end_n = strtotime('+1 day',strtotime($fecha));
	$nuevo_end =date('Y-m-j',$end_n);
	
	$color="#FFD700";
	$Events = new Events();
	if ($hora_solucion=="00:00:00") {
	$star = $fecha.' 00:00:00';
	$end= $nuevo_end.' 00:00:00';
	}else{
	$star = $fecha.' '.$hora_solucion;
	$end= $nuevo_end.' 00:00:00';
	}
	
	$descri ="Solucionar el Ticket N°: ".$lastT. ", con falla: ".$descripcion.".";
	$Events->setTittle($tittle);
	$Events->setStar($star);	
	$Events->setEnd($end);	
	$Events->setColor($color);
	$Events->setDescripcion($descri);
	$Events->setId_usuario($id_usuario);
	$Events->setId_ticket($lastT);
	$save=$Events->save();
		 
		 $contac = new Contactos();
		 $clien = new Cliente();
		 $usuar = new Usuario();
		 $prd = new Productos();
		 $datosContactos = $contac->selectOne($id_contacto);
		 $datosClientes = $clien->selectOne($id_cliente);
		 $datosUsuarios = $usuar->selectOne($id_usuario);
		 $datosProductos = $prd->selectOne($id_producto);
		 foreach ($datosContactos as $value) {
		 	$nombreContacto = $value['nombre'];
		 	$correoContacto = $value['correo'];
		 	$movilContacto = $value['movil'];
		 }
		 foreach ($datosClientes as $value1) {
		 	$nombreCliente = $value1['nombre'];
		 }
		 foreach ($datosUsuarios as $value2) {
		 	$nombreUsuario = $value2['nombre'];
		 	$correoUsuario = $value2['correo'];
		 }
		 foreach ($datosProductos as $value3) {
		 	$nombreProducto = $value3['nombre'];
		 }
		 $asunto = "Ticket asignado: ".$lastT."";
		 $mensaje = "Estimado ".$nombreUsuario.", se le asignado el Ticket con Correlativo: ".$lastT." correspondiente a la empresa: <br>
				<strong>".$nombreCliente."<strong> <br> con los datos de contacto: <br>
				<table class='table table-bordered'>
					<tr>
						<td>Nombre de contacto: </td><td>".$nombreContacto."</td>
					</tr>
					<tr>
						<td>Correo de contacto: </td><td>".$correoContacto."</td>
					</tr>
					<tr>
						<td>Numero de contacto: </td><td>".$movilContacto."</td>
					</tr>
				</table>
				<br>
				<p>El equipo: <strong>".$nombreProducto."</strong></p>
				<p>Presenta la siguiente falla:</p>
				<p>".$descripcion."</p>
				<p><strong>Fecha Cita: ".$star.", Hora citada: ".$hora_solucion."</strong></p><br>
				<p>Cualquier consulta ingrese al sitio o comuniquese con su jefe, Muchas gracias.</p>";
	$sending = new Mailer($asunto,$mensaje,"",$correoUsuario,"","","",$nombreUsuario,"");
		$resultado = $sending->enviarCorreoTicket();
}
	
	
		header('Location: ../listas/Tickets.php?success=correcto&fecha='.$nuevo_end.'');


		# code...
	}
	else{
		header('Location: ../listas/Tickets.php?error=incorrecto&producot='.$id_producto.'&cliente='.$id_cliente.'&id_contacto='.$id_contacto.'&fecha='.$nuevo_end.'');
	}
}
elseif ($accion=="guardarNC") 
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
	$save1=$cliente->save();
	if ($save1==true) {
		$lastCliente=$cliente->selectLast();
		foreach ($lastCliente as $key) {

			$id_nc=$key["id_cliente"]+1;
		}
		$nombre1=$_POST['nombrec'];
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
		$id_cliente =$id_nc-1;
		$contactos = new Contactos();
		$contactos->setNombre($nombre1);
		$contactos->setCorreo($correo);
		$contactos->setTelefono($telefono);
		$contactos->setExtension($extension);
		$contactos->setMovil($movil);		
		$contactos->setId_cliente($id_cliente);
		$save=$contactos->save();
		if ($save==true) {
			header('Location: ../views/saveTicket.php?cliente='.$id_cliente.'&nombre='.$nombre.'&codigo_serie=0000&producto=N/A&id_producto=0');
			# code...
		}
		else{
			header('Location: ../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto='.$id_cliente.'');
		}
	}

		
	
	else{
		header('Location: ../listas/clientes.php?error=incorrecto');
	}

}
elseif ($accion=="guardarC") 
{	

	$empresa=$_POST['empresa'];
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
	$contactos = new Contactos();
	$contactos->setNombre($nombre);
	$contactos->setCorreo($correo);
	$contactos->setTelefono($telefono);
	$contactos->setExtension($extension);
	$contactos->setMovil($movil);		
	$contactos->setId_cliente($id_cliente);
	$save=$contactos->save();
	if ($save==true) {
			header('Location: ../views/saveTicket.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie=0000&producto=N/A&id_producto=0');
		# code...
	}
	else{
		header('Location: ../listas/Tickets.php?error=incorrecto&producot='.$id_producto.'&cliente='.$id_cliente.'&id_contacto='.$id_contacto.'');
	}
}
	


?>