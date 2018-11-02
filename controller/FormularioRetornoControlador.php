<?php
require_once "../class/FormularioRetorno.php";
require_once "../class/DetalleRetorno.php";
$accion=$_GET['accion'];

if ($accion=="modificar") {

	//-formulario de retorno-----
	$sales_order=$_POST['sales_order'];
	$PO=$_POST['PO'];
	$ship_method_via=$_POST['ship_method_via'];
	$customer_phone=$_POST['customer_phone'];
	$customer_fax=$_POST['customer_fax'];
	$warranty_status=$_POST['warranty_status'];
	$cliente_nombre=$_POST['cliente_nombre'];
	$cliente_phone=$_POST['cliente_phone'];
	$accion=$_POST['accion'];
	$bill_to=$_POST['bill_to'];
	$ship_to=$_POST['ship_to'];
	$customer_address=$_POST['customer_address'];
	$cityr=$_POST['city'];
	$aplicacion=$_POST['aplicacion'];
	$enviroment=$_POST['sales_order'];
	$operating_condition=$_POST['operating_condition'];
	$temperature=$_POST['temperature'];
	$comentarios=$_POST['comentarios'];
	$estado=$_POST['estado'];
	$id_form_retorno=$_POST['id_form_retorno'];
	//---------------------detalle retorno-----------------------------------
	$part_number_description =$_POST['part_number_description'];
	$marsh_authorization_level=$_POST['marsh_authorization_level'];
	$equipament_serial_number=$_POST['equipament_serial_number'];	
	$codigo_serie=$_POST['codigo_serie'];
	$cantidad=$_POST['cantidad'];
	$id_part_fail=$_POST['id_part_fail'];
	$invoice=$_POST['invoice'];
	$id_detalle_retorno =$_POST['id'];
	$FormularioRetorno = new FormularioRetorno();
	$FormularioRetorno->setPart_number_description($part_number_description);	
	$FormularioRetorno->setMarsh_authorization_level($marsh_authorization_level);
	$FormularioRetorno->setEquipament_serial_number($equipament_serial_number);
	$FormularioRetorno->setCodigo_Serie($codigo_serie);
	$FormularioRetorno->setId_detalle_retorno($id_detalle_retorno);
	$update=$FormularioRetorno->update();
	if ($update==true) {
		header('Location: ../listas/FormularioRetorno.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/FormularioRetorno.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {	
	$id_FormularioRetorno =$_GET['id'];
	$FormularioRetorno = new FormularioRetorno();
	$FormularioRetorno->setId_detalle_retorno($id_FormularioRetorno);
	$delete=$FormularioRetorno->delete();
	if ($delete==true) {
		header('Location: ../listas/FormularioRetorno.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/FormularioRetorno.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{	
	//-formulario de retorno-----
	$fecha=$_POST['fecha'];
	$sales_order=$_POST['sales_order'];
	$PO=$_POST['PO'];
	$ship_method_via=$_POST['ship_method_via'];
	$customer_phone=$_POST['customer_phone'];
	$customer_fax=$_POST['customer_fax'];
	$warranty_status=$_POST['warranty_status'];
	$cliente_nombre=$_POST['cliente_nombre'];
	$cliente_phone=$_POST['cliente_phone'];
	$accion=$_POST['accion'];
	$bill_to=$_POST['bill_to'];
	$ship_to=$_POST['ship_to'];
	$customer_address=$_POST['customer_address'];
	$cityr=$_POST['city'];
	$aplicacion=$_POST['aplicacion'];
	$enviroment=$_POST['sales_order'];
	$operating_condition=$_POST['operating_conditions'];
	$temperature=$_POST['temperature'];
	$comentarios=$_POST['comentario'];
	$estado=$_POST['estado'];
	//---------detalle de retorno-------

	$part_number_description =$_POST['part_number_description'];
	$marsh_authorization_level=$_POST['marsh_authorization_level'];
	$equipament_serial_number=$_POST['equipament_serial_number'];	
	$codigo_serie=$_POST['codigo_serie'];
	$cantidad=$_POST['cantidad'];
	$id_part_fail=$_POST['id_part_fail'];
	$invoice=$_POST['invoice'];
	$cont=count($part_number_description);




	$FormularioRetorno = new FormularioRetorno();
	$FormularioRetorno->setFecha($fecha);
	$FormularioRetorno->setSales_order($sales_order);
	$FormularioRetorno->setPO($PO);
	$FormularioRetorno->setShip_method_via($ship_method_via);
	$FormularioRetorno->setCustomer_phone($customer_phone);
	$FormularioRetorno->setCustomer_fax($customer_fax);
	$FormularioRetorno->setWarranty_status($warranty_status);
	$FormularioRetorno->setCliente_nombre($cliente_nombre);
	$FormularioRetorno->setCliente_phone($cliente_phone);
	$FormularioRetorno->setAccion($accion);
	$FormularioRetorno->setBill_to($bill_to);
	$FormularioRetorno->setShip_to($ship_to);
	$FormularioRetorno->setCustomer_address($customer_address);
	$FormularioRetorno->setCity($city);
	$FormularioRetorno->setAplicacion($aplicacion);
	$FormularioRetorno->setEnviroment($enviroment);
	$FormularioRetorno->setOperating_conditions($operating_condition);
	$FormularioRetorno->setTemperature($temperature);
	$FormularioRetorno->setComentarios($comentarios);
	$FormularioRetorno->setEstado($estado);
	$save=$FormularioRetorno->save();

	if ($save==true) {
		$lastFR=$FormularioRetorno->selectLast();
		foreach ($lastFR as $key) {
			$id_lform = $key['id_form_retorno'];
		}
		$i=0;

while ( $i<$cont) {
$dr = new DetalleRetorno();
	$dr->setPart_number_description($part_number_description[$i]);	
	$dr->setMarsh_authorization_level($marsh_authorization_level[$i]);
	$dr->setEquipment_serial_number($equipament_serial_number[$i]);
	$dr->setCodigo_Serie($codigo_serie[$i]);
	$dr->setCantidad($cantidad[$i]);
	$dr->setId_part_fail($id_part_fail[$i]);
	$dr->setId_form_retorno($id_lform);
	$dr->save();
	$i=$i+1;

}
	
	/*
	$FormularioRetorno->setMarsh_authorization_level($marsh_authorization_level);
	$FormularioRetorno->setCodigo_Serie($codigo_serie);
	$FormularioRetorno->setPart_number_description($part_number_description);	
	$save=$FormularioRetorno->save();
	*/
		header('Location: ../listas/FormularioRetorno.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/FormularioRetorno.php?error=incorrecto');
	}
}

?>