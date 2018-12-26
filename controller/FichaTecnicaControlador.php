<?php
require_once "../class/FichaTenica.php";
require_once "../class/Cliente.php";
require_once "../class/Contactos.php";
require_once "../class/Repuestos.php";
require_once "../class/Consumibles.php";
//DOMPDF




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
	$equipo_queda =$_POST['equipo_queda'];
	
	$id_cliente =$_POST['id_cliente'];
	$id_producto =$_POST['id_producto'];
	if (isset($_POST['id_contacto'])) {
		$id_contacto =$_POST['id_contacto'];
	}else{
		$id_contacto=NULL;
	}
	if (isset($_POST['trabajo'])) {
			$trabajo =$_POST['trabajo'];
	}else
	{
		$trabajo==NULL;
	}
	if (isset($_POST['falla'])) {
			$falla =$_POST['falla'];
	}else
	{
		$falla==NULL;
	}
	$firma_cliente1=$_POST['firma_cliente'];
	$firma_tecnico1=$_POST['firma_tecnico'];
	$id_ficha_tecnica=$_POST['id_ficha_tecnica'];
	$id_tipo_ma=$_POST['id_tipo_ma'];
		if ($_POST['linea_produccion']) {
		
	$linea_produccion=$_POST['linea_produccion'];
	}else{
		$linea_produccion=NULL;
	}	
	if ($_POST['datos_generales']) {
		
	$datos_generales=$_POST['datos_generales'];
	}else{
		$datos_generales=NULL;
	}
	if ($_POST['recibe']) {
		
	$recibe=$_POST['recibe'];
	}else{
		$recibe=NULL;
	}
	$bandera=$_POST['bandera'];
	$estado=$_POST['estado'];		

	$id_repuestos=$_POST['id_repuestos'];
	$cantidades=$_POST['cantidad'];
	$cont_repuestos=count($cantidades);

	$id_consumibles=$_POST['id_consumibles'];
	$cantidadesC=$_POST['cantidadC'];
	$cont_consumibles=count($cantidadesC);

	if (isset($_FILES['foto_uno'])) {
		 $carpeta = $_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$id_ficha_tecnica;
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
			   	$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
				$fichero=$directorio.basename($_FILES['foto_uno']['name']);
				if (move_uploaded_file($_FILES['foto_uno']['tmp_name'], $fichero)) {
					$nombre=$_FILES['foto_uno']['name'];
					$foto_uno='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre;
					} 
			}else{

			   	$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
				$fichero=$directorio.basename($_FILES['foto_uno']['name']);
				if (move_uploaded_file($_FILES['foto_uno']['tmp_name'], $fichero)) {
					$nombre=$_FILES['foto_uno']['name'];
					$foto_uno='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre;
					} 
			}
	

	}
	else{
		if (isset($_POST['foto1'])) {
			$foto_uno=$_POST['foto1'];
		}
		else{
			$foto_uno =NULL;

		}
      }
	if (isset($_FILES['foto_dos'])) {
					$carpeta =  $_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$id_ficha_tecnica;
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
		$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
		$fichero=$directorio.basename($_FILES['foto_dos']['name']);
		if (move_uploaded_file($_FILES['foto_dos']['tmp_name'], $fichero)) {
			$nombre2=$_FILES['foto_dos']['name'];

			$foto_dos='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre2;
			}
}
			else{

		$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
		$fichero=$directorio.basename($_FILES['foto_dos']['name']);
		if (move_uploaded_file($_FILES['foto_dos']['tmp_name'], $fichero)) {
			$nombre2=$_FILES['foto_dos']['name'];

			$foto_dos='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre2;
			}

			}
	}
	else{

		if (isset($_POST['foto2'])) {
			$foto_dos=$_POST['foto2'];
		}
		else{
			$foto_dos =NULL;

		}
	}
	if (isset($_FILES['foto_tres'])) {
				$carpeta =$_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$id_ficha_tecnica;
		if (!file_exists($carpeta)) {
		    mkdir($carpeta, 0777, true);
		$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
		$fichero=$directorio.basename($_FILES['foto_tres']['name']);
		if (move_uploaded_file($_FILES['foto_tres']['tmp_name'], $fichero)) {
			$nombre3=$_FILES['foto_tres']['name'];
			$foto_tres='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre3;
			}
		}
		else{

		$directorio = $carpeta.'/fichaTecnica'.$id_ficha_tecnica.'_';
		$fichero=$directorio.basename($_FILES['foto_tres']['name']);
		if (move_uploaded_file($_FILES['foto_tres']['tmp_name'], $fichero)) {
			$nombre3=$_FILES['foto_tres']['name'];
			$foto_tres='fichaTecnica'.$id_ficha_tecnica.'_'.$nombre3;
			}
		}
		}
	else{
		if (isset($_POST['foto3'])) {
			$foto_tres=$_POST['foto3'];
		}
		else{
			$foto_tres =NULL;

		}
	}

	$FichaTecnica = new FichaTecnica();		
	$FichaTecnica->setId_ficha_tecnica($id_ficha_tecnica);
	$FichaTecnica->setLatitud($latitud);
	$FichaTecnica->setLongitud($longitud);
	$FichaTecnica->setEquipo_queda($equipo_queda);		
	$FichaTecnica->setId_cliente($id_cliente);
	$FichaTecnica->setId_producto($id_producto);
	$FichaTecnica->setId_contacto($id_contacto);
	$FichaTecnica->setTrabajo($trabajo);
	$FichaTecnica->setFalla($falla);
	$FichaTecnica->setId_tipo_ma($id_tipo_ma);
	$FichaTecnica->setLinea_produccion($linea_produccion);
	if ($estado=="Finalizado") {
	$FichaTecnica->setHora_egreso(date("h"));		
	}else{
	$Hora_e=NULL;
	$FichaTecnica->setHora_egreso($Hora_e);
	}
	$FichaTecnica->setDatos_generales($datos_generales);
	$FichaTecnica->setRecibe($recibe);	
	$FichaTecnica->setFoto_uno($foto_uno);
	$FichaTecnica->setFoto_dos($foto_dos);
	$FichaTecnica->setFoto_tres($foto_tres);
	$FichaTecnica->setEstado($estado);	

	$update=$FichaTecnica->update();
	$i=0;
	while ($i<$cont_repuestos) {
		if ($cantidades[$i]=="") {
			$i=$i+1;
		}else
		{
				$dr = new Repuestos();
					$dr->setId_ficha_tecnica($id_ficha_tecnica);
					$dr->setId_repuesto($id_repuestos[$i]);
					$dr->setCantidad($cantidades[$i]);
					$dr->update1();
				$i=$i+1;

		}
	}
		$a=0;
	while ($a<$cont_consumibles) {
		if ($cantidadesC[$a]=="") {
			$a=$a+1;
		}
		else{

				$dr = new Consumibles();
					$dr->setId_ficha_tecnica($id_ficha_tecnica);
					$dr->setId_consumible($id_consumibles[$a]);
					$dr->setCantidad($cantidadesC[$a]);
					$dr->update1();
				$a=$a+1;
		}
		}
	if ($update==true) {
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
		if($bandera=="usuario"){

		header('Location: ../listas/FichaTecnca_u.php?success=correcto&contador='.$bandera.'&latitud='.$latitud.'');
		}elseif($bandera=="admin"){
		header('Location: ../listas/FichaTecnca.php?success=correcto');
		}
		# code...
	}else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto&recibe='.$id_tipo_ma.'');
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

	$latphp = $_COOKIE["latcookie"];
$lonphp = $_COOKIE["loncookie"];
	$latitud=$_POST['lti'];
	$longitud=$_POST['lgi'];

	if (isset($_POST['id_contacto'])) {
		$id_contacto =$_POST['id_contacto'];
	}else{
		$id_contacto=NULL;
	}
	
    
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

	if (isset($_POST['trabajo'])) {
			$trabajo =$_POST['trabajo'];
	}else
	{
		$trabajo==NULL;
	}


	$equipo_queda =$_POST['equipo_queda'];
	if (isset($_POST['ticket'])) {
		$ticket=$_POST['ticket'];
	}
	if (isset($_POST['falla'])) {
			$falla =$_POST['falla'];
	}else
	{
		$falla==NULL;
	}
	
	$id_tipo_ma=$_POST['id_tipo_ma'];
	if ($_POST['linea_produccion']) {
		
	$linea_produccion=$_POST['linea_produccion'];
	}else{
		$linea_produccion=NULL;
	}	
	if ($_POST['datos_generales']) {
		
	$datos_generales=$_POST['datos_generales'];
	}else{
		$datos_generales=NULL;
	}
	if ($_POST['recibe']) {
		
	$recibe=$_POST['recibe'];
	}else{
		$recibe= NULL;
	}
	
	
		
	if (isset($_FILES['foto_uno'])) {
		 $carpeta = $_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$ficTec;
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
			   	$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
				$fichero=$directorio.basename($_FILES['foto_uno']['name']);
				if (move_uploaded_file($_FILES['foto_uno']['tmp_name'], $fichero)) {
					$nombre=$_FILES['foto_uno']['name'];
					$foto_uno='fichaTecnica'.$ficTec.'_'.$nombre;
					} 
			}else{

			   	$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
				$fichero=$directorio.basename($_FILES['foto_uno']['name']);
				if (move_uploaded_file($_FILES['foto_uno']['tmp_name'], $fichero)) {
					$nombre=$_FILES['foto_uno']['name'];
					$foto_uno='fichaTecnica'.$ficTec.'_'.$nombre;
					} 
			}
	
	}
	else{

		$foto_uno =NULL;
	}
	if (isset($_FILES['foto_dos'])) {
					$carpeta =  $_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$ficTec;
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
		$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
		$fichero=$directorio.basename($_FILES['foto_dos']['name']);
		if (move_uploaded_file($_FILES['foto_dos']['tmp_name'], $fichero)) {
			$nombre2=$_FILES['foto_dos']['name'];

			$foto_dos='fichaTecnica'.$ficTec.'_'.$nombre2;
			}
}
			else{

		$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
		$fichero=$directorio.basename($_FILES['foto_dos']['name']);
		if (move_uploaded_file($_FILES['foto_dos']['tmp_name'], $fichero)) {
			$nombre2=$_FILES['foto_dos']['name'];

			$foto_dos='fichaTecnica'.$ficTec.'_'.$nombre2;
			}

			}
	}
	else{

		$foto_dos=NULL;
	}
	if (isset($_FILES['foto_tres'])) {
				$carpeta =$_SERVER['DOCUMENT_ROOT'].'/Hermes/fotos/fichaTecnica'.$ficTec;
		if (!file_exists($carpeta)) {
		    mkdir($carpeta, 0777, true);
		$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
		$fichero=$directorio.basename($_FILES['foto_tres']['name']);
		if (move_uploaded_file($_FILES['foto_tres']['tmp_name'], $fichero)) {
			$nombre3=$_FILES['foto_tres']['name'];
			$foto_tres='fichaTecnica'.$ficTec.'_'.$nombre3;
			}
		}
		else{

		$directorio = $carpeta.'/fichaTecnica'.$ficTec.'_';
		$fichero=$directorio.basename($_FILES['foto_tres']['name']);
		if (move_uploaded_file($_FILES['foto_tres']['tmp_name'], $fichero)) {
			$nombre3=$_FILES['foto_tres']['name'];
			$foto_tres='fichaTecnica'.$ficTec.'_'.$nombre3;
			}
		}
		}
	
	else{

		$foto_tres =NULL;
	}
	$id_repuestos=$_POST['id_repuestos'];
	$cantidades=$_POST['cantidad'];
	$cont_repuestos=count($cantidades);

	$id_consumibles=$_POST['id_consumibles'];
	$cantidadesC=$_POST['cantidadC'];
	$cont_consumibles=count($cantidadesC);

	$FichaTecnic->setLatitud($latitud);		
	$FichaTecnic->setLongitud($longitud);
	$FichaTecnic->setId_contacto($id_contacto);		
	$FichaTecnic->setId_cliente($id_cliente);
	$FichaTecnic->setId_usuario($id_usuario);
	$FichaTecnic->setId_producto($id_producto);
	$FichaTecnic->setTrabajo($trabajo);
	$FichaTecnic->setEquipo_queda($equipo_queda);
	$FichaTecnic->setFirma_cliente($firma_cliente);
	$FichaTecnic->setFirma_tecnico($firma_tecnico);
	$FichaTecnic->setFalla($falla);
	$FichaTecnic->setId_tipo_ma($id_tipo_ma);
	$FichaTecnic->setLinea_produccion($linea_produccion);
	$FichaTecnic->setHora_ingreso(date("h"));	
	$FichaTecnic->setDatos_generales($datos_generales);
	$FichaTecnic->setRecibe($recibe);	
	$FichaTecnic->setFoto_uno($foto_uno);
	$FichaTecnic->setFoto_dos($foto_dos);
	$FichaTecnic->setFoto_tres($foto_tres);

	$save=$FichaTecnic->save();
	$i=0;
	$a=0;
	$ft1=$FichaTecnic->selectLast();
	foreach ($ft1 as $key) {
		$id_nf1=$key['id_ficha_tecnica'];
		}
	$lastFT=$id_nf1;
		/*do {
				$dr = new Repuestos();
					$dr->setId_ficha_tecnica($lastFT);
					$dr->setId_repuesto($id_repuesto[$i]);
					$dr->setCantidad($cantidades[$i]);
					$dr->save1();
				$i=$i+1;
				} while ($i<=$cont_repuestos );*/
		while ($i<$cont_repuestos) {
			if ($cantidades[$i]=="") {
			$i=$i+1;
			}else{
				$dr = new Repuestos();
					$dr->setId_ficha_tecnica($lastFT);
					$dr->setId_repuesto($id_repuestos[$i]);
					$dr->setCantidad($cantidades[$i]);
					$dr->save1();
				$i=$i+1;

			}
		}
		while ($a<$cont_consumibles) {
			if ($cantidadesC[$a]=="") {
				$a=$a+1;
			}else{
				$dr = new Consumibles();
					$dr->setId_ficha_tecnica($lastFT);
					$dr->setId_consumible($id_consumibles[$a]);
					$dr->setCantidad($cantidadesC[$a]);
					$dr->save1();
				$a=$a+1;

			}
		}
	if ($save==true) {
		
	unset ($_COOKIE ["latcookie"]);
	unset ($_COOKIE ["loncookie"]);

    // llamamos a la funcion uploadImgBase64( img_base64, nombre_fina.png) 
    
    uploadImgBase64($_POST['imagenC'], 'mi_firma_'.$firma_cliente.'.png' );

    uploadImgBase64($_POST['imagen2'], 'mi_firma_'.$firma_tecnico.'.png' );

		if ($bandera=="ticket") {
			header('Location: ../views/modiTicket.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie='.$codigo_serie.'&producto='.$producto.'&id_producto='.$id_producto.'&id_ficha_tecnica='.$ficTec.'&id='.$ticket.'&contador='.$cont_repuestos.'');
		}elseif($bandera=="ticket_u"){
			header('Location: ../views/modiTicket_u.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie='.$codigo_serie.'&producto='.$producto.'&id_producto='.$id_producto.'&id_ficha_tecnica='.$ficTec.'&id='.$ticket.'&contador='.$cont_repuestos.'&bandera='.$bandera.'');
		}elseif($bandera=="usuario"){

		header('Location: ../listas/FichaTecnca_u.php?success=correcto&contador='.$bandera.'&latitud='.$latitud.'');
		}
		else{

		header('Location: ../listas/FichaTecnca.php?success=correcto&contador='.$bandera.'&latitud='.$latitud.'');
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
			}
			elseif($bandera=="usuario"){
			header('Location: ../views/saveFT.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie=0000&producto=N/A&id_producto=0&badnera=usuario');

			}
			else{
			header('Location: ../views/saveFT.php?cliente='.$id_cliente.'&nombre='.$empresa.'&codigo_serie=0000&producto=N/A&id_producto=0');

			}
			
		# code...
	}
	else{
		header('Location: ../listas/FichaTecnca.php?error=incorrecto&producot='.$id_producto.'&cliente='.$id_cliente.'&id_contacto='.$id_contacto.'');
	}
}
elseif ($accion=="modificarFirma") {
	$firma_cliente =$_POST['firma_cliente'];
	$firma_tecnico =$_POST['firma_tecnico'];
	$bandera=$_POST['bandera'];

    uploadImgBase64($_POST['imagenC'], 'mi_firma_'.$firma_cliente.'.png' );

    uploadImgBase64($_POST['imagen2'], 'mi_firma_'.$firma_tecnico.'.png' );

    header('Location: ../listas/FichaTecnca.php?success=correcto');


}

?>