<?php
require_once "../class/Usuario.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_tipo_usuario =$_POST['id_tipo_usuario'];

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];	
	$id_usuario =$_POST['id_usuario'];
	$usuarioss = new Usuario();
	$usuarioss->setNombre($nombre);
	$usuarioss->setApellido($apellido);
	$usuarioss->setCorreo($correo);
	$usuarioss->setId_tipo_usuario($id_tipo_usuario);	
	$usuarioss->setId_usuario($id_usuario);
	$update=$usuarioss->update();
	if ($update==true) {
		header('Location: ../listas/Usuarios.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Usuarios.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_usuario =$_GET['id'];
	$estado =$_GET['estado'];
	$usuaro = new Usuario();
	$usuaro->setId_usuario($id_usuario);
	$usuaro->setEstado($estado);
	$delete=$usuaro->updateStatus();
	if ($delete==true) {
		header('Location: ../listas/Usuarios.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Usuarios.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$contraseña =$_POST['contraseña'];
	$id_tipo_usuario =$_POST['id_tipo_usuario'];
	$usuario = new Usuario();
	$usuario->setNombre($nombre);
	$usuario->setApellido($apellido);
	$usuario->setCorreo($correo);
	$usuario->setContraseña($contraseña);
	$usuario->setId_tipo_usuario($id_tipo_usuario);	
	$save=$usuario->save();
	if ($save==true) {
		header('Location: ../listas/Usuarios.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Usuarios.php?error=incorrecto&nombre='.$nombre.'&apellido='.$apellido.'&tipousuario='.$id_tipo_usuario.'&contraseña='.$contraseña.'');
	}
}
elseif ($accion=="contra") 
{	
	
	$contra_antigua=$_POST['contra_anti'];
	$idusuario=$_POST['id_usuario'];
	$contra_nueva=$_POST['confirmado'];
	$usuario = new Usuario();
	$save=$usuario->updatePass($contra_antigua,$contra_nueva,$idusuario);
	if ($save=="Correcto") {
		header('Location: ../views/modiContra.php?success=correcto');
		# code...
	}
	elseif($save=="Incorrecto"){
		header('Location: ../views/modiContra.php?error=incorrecto');
	}else{
		header('Location: ../views/modiContra.php?error=error');
	}
}

elseif ($accion=="contraAll") 
{	
	
	$idusuario=$_POST['id_usuario'];
	$contra_nueva=$_POST['confirmado'];
	$usuario = new Usuario();
	$save=$usuario->updatePass1($contra_nueva,$idusuario);
	if ($save=="Correcto") {
		header('Location: ../listas/Usuarios.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Usuarios.php?error=error');
	}
}

?>