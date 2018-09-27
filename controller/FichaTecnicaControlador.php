<?php
require_once "../class/FichaTenica.php";
require_once "../class/Cliente.php";
require_once "../class/Contactos.php";

$accion=$_GET['accion'];

 function uploadImgBase64 ($base64, $name){
        // decodificamos el base64
        $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        // definimos la ruta donde se guardara en el server
        $path= $_SERVER['DOCUMENT_ROOT'].'/Hermes/firmas/'.$name;
        // guardamos la imagen en el server
        if(!file_put_contents($path, $datosBase64)){
            // retorno si falla
            return false;
        }
        else{
            // retorno si todo fue bien
            return true;
        }
    }
if ($accion=="modificar") {
	$latitud=0;
	$longitud=0;	
	$descripcion =$_POST['descripcion'];
	$equipo_queda =$_POST['equipo_queda'];
	$id_cliente =$_POST['id_cliente'];
	$id_producto =$_POST['id_producto'];
	$id_contacto =$_POST['id_contacto'];
	$trabajo =$_POST['trabajo'];
	$falla =$_POST['falla'];
	$firma_cliente1=$_POST['firma_cliente'];
	$firma_tecnico1=$_POST['firma_tecnico'];
	$id_ficha_tecnica=$_POST['id_ficha_tecnica'];
	$FichaTecnica = new FichaTecnica();		
	$FichaTecnica->setId_ficha_tecnica($id_ficha_tecnica);
	$FichaTecnica->setLatitud($latitud);
	$FichaTecnica->setLongitud($longitud);
	$FichaTecnica->setDescripcion($descripcion);
	$FichaTecnica->setEquipo_queda($equipo_queda);		
	$FichaTecnica->setId_cliente($id_cliente);
	$FichaTecnica->setId_producto($id_producto);
	$FichaTecnica->setId_contacto($id_contacto);
	$FichaTecnica->setTrabajo($trabajo);
	$FichaTecnica->setFalla($falla);

	$update=$FichaTecnica->update();
	if ($update==true) {
		header('Location: ../listas/FichaTecnca.php?success=correcto');
		$archivo='../firmas/mi_firma_'.$firma_cliente1.'.png';
		$NueArchivo=$_POST['imagenC'];
		$datosBase641 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$NueArchivo));
		if (filesize($archivo)<=1000 || filesize($datosBase641)>=1000 ){
			uploadImgBase64($_POST['imagenC'], 'mi_firma_'.$firma_cliente1.'.png' );
		}
		$archivo1='../firmas/mi_firma_'.$firma_tecnico1.'.png';
		if (filesize($archivo1)<=1000) {
			
   			 uploadImgBase64($_POST['imagen2'], 'mi_firma_'.$firma_tecnico1.'.png' );
		}
		# code...
	}else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_contacto =$_GET['id'];
	$FichTecnica = new FichaTecnica();
	$FichTecnica->setId_contacto($id_contacto);
	$delete=$FichTecnica->delete();
	if ($delete==true) {
		header('Location: ../listas/FichaTecnca.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$FichaTecnic = new FichaTecnica();
	$latitud=0;
	$longitud=0;
    $id_contacto =$_POST['id_contacto'];
	$id_cliente =$_POST['id_cliente'];
	$id_usuario =$_POST['id_usuario'];	
	$id_producto =$_POST['id_producto'];
	$empresa=$_POST['empresa'];
	$producto =$_POST['producto'];
	$codigo_serie =$_POST['codigo_serie'];
	$bandera =$_POST['bandera'];
		$ft=$FichaTecnic->selectLast();
	foreach ($ft as $key) {
	$id_nf=$key['id_ficha_tecnica']+1;
		}
	$ficTec =$id_nf;
	$firma_cliente="FichaTecnica".$ficTec."Cliente".$id_cliente."";
	$firma_tecnico="FichaTecnica".$ficTec."Tecnico".$id_usuario."";		
	$descripcion =$_POST['descripcion'];
	$trabajo =$_POST['trabajo'];
	$equipo_queda =$_POST['equipo_queda'];

	$falla =$_POST['falla'];		
	$FichaTecnic->setId_contacto($id_contacto);		
	$FichaTecnic->setId_cliente($id_cliente);
	$FichaTecnic->setId_usuario($id_usuario);
	$FichaTecnic->setId_producto($id_producto);
	$FichaTecnic->setDescripcion($descripcion);	
	$FichaTecnic->setTrabajo($trabajo);
	$FichaTecnic->setEquipo_queda($equipo_queda);
	$FichaTecnic->setFirma_cliente($firma_cliente);
	$FichaTecnic->setFirma_tecnico($firma_tecnico);
	$FichaTecnic->setFalla($falla);	
	$save=$FichaTecnic->save();
	if ($save==true) {

    // llamamos a la funcion uploadImgBase64( img_base64, nombre_fina.png) 
    
    uploadImgBase64($_POST['imagenC'], 'mi_firma_'.$firma_cliente.'.png' );

    uploadImgBase64($_POST['imagen2'], 'mi_firma_'.$firma_tecnico.'.png' );

		if ($bandera=="ticket") {
			header('Location: ../views/saveTicket.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie='.$codigo_serie.'&producto='.$producto.'&id_producto='.$id_producto.'&id_ficha_tecnica='.$ficTec.'');
		}else{

		header('Location: ../listas/FichaTecnca.php?success=correcto');
		}

		# code...
	}
	else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto&id_usuario='.$id_usuario.'&id_cliente='.$id_cliente.'&id_contacto='.$id_contacto.'&equipo_queda='.$equipo_queda.'&descripcion='.$firma_tecnico.'&falla='.$firma_cliente.'');

	}
}
elseif ($accion=="guardarNC") 
{	
	$bandera=$_POST['bandera'];
	$producto=$_POST['producto'];
	$id_producto=$_POST['id_producto'];
	$codigo_serie=$_POST['codigo_serie'];
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
		$extension =$_POST['extension'];
		$movil =$_POST['movil'];
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
			if ($bandera=="ticket") {
			header('Location: ../views/saveFT_T.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie='.$codigo_serie.'&producto='.$producto.'&id_producto='.$id_producto.'');
			}else{
			header('Location: ../views/saveFT.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie=0000&producto=N/A&id_producto=0');

			}
	
			# code...
		}
		else{
			header('Location: ../listas/FichaTecnca.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto='.$id_cliente.'');
		}
	}

		
	
	else{
		header('Location: ../listas/clientes.php?error=incorrecto');
	}

}
elseif ($accion=="guardarC") 
{	$bandera=$_POST['bandera'];
	$producto=$_POST['producto'];
	$id_producto=$_POST['id_producto'];
	$codigo_serie=$_POST['codigo_serie'];
	
	$empresa=$_POST['empresa'];
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
			if ($bandera=="ticket") {
			header('Location: ../views/saveFT_T.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie='.$codigo_serie.'&producto='.$producto.'&id_producto='.$id_producto.'');
			}else{
			header('Location: ../views/saveFT.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie=0000&producto=N/A&id_producto=0');

			}
			
		# code...
	}
	else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto&producot='.$id_producto.'&cliente='.$id_cliente.'&id_contacto='.$id_contacto.'');
	}
}

?>