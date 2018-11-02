<?php 
require_once "../config/conexion.php";

/**
 * 
 */
class FormularioRetorno extends Conexion
{
	 private $id_form_retorno;
 private $sales_order;
 private $PO;
 private $ship_method_via;
 private $customer_phone;
 private $customer_fax;
 private $warranty_status;
 private $cliente_nombre;
 private $cliente_phone;
 private $accion;
 private $bill_to;
 private $ship_to;
 private $customer_address;
 private $city;
 private $aplicacion;
 private $enviroment;
 private $operating_conditions;
 private $temperature;
 private $comentarios;
 private $estado;
 private $fecha;




 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_form_retorno ="";
        $this->sales_order ="";
        $this->PO ="";
        $this->ship_method_via="";
        $this->customer_phone="";
        $this->customer_fax="";
        $this->warranty_status="";
        $this->cliente_nombre="";
        $this->cliente_phone="";
        $this->accion="";        
        $this->bill_to="";
        $this->ship_to="";
        $this->customer_address="";
        $this->city="";
        $this->aplicacion="";
        $this->enviroment="";
        $this->operating_conditions="";
        $this->temperature="";
        $this->comentarios="";
        $this->estado="";
        $this->fecha="";

    }

	public function getId_form_retorno() {
        return $this->id_form_retorno;
    }

    public function setId_form_retorno($id) {
        $this->id_form_retorno = $id;
    }
    
    public function getSales_order() {
        return $this->sales_order;
    }

    public function setSales_order($atitud) {
        $this->sales_order = $atitud;
    }

    public function getPO() {
        return $this->PO;
    }

    public function setPO($PO) {
        $this->PO = $PO;
    }

	public function getShip_method_via() {
        return $this->ship_method_via;
    }

    public function setShip_method_via($ship_method_via) {
        $this->ship_method_via = $ship_method_via;
    }
    
    public function getCustomer_phone() {
        return $this->customer_phone;
    }

    public function setCustomer_phone($customer_phone) {
        $this->customer_phone = $customer_phone;
    }
    public function getCustomer_fax() {
        return $this->customer_fax;
    }

    public function setCustomer_fax($customer_fax) {
        $this->customer_fax = $customer_fax;
    }
    public function getwarranty_status() {
        return $this->warranty_status;
    }

    public function setwarranty_status($warranty_status) {
        $this->warranty_status= $warranty_status;
    }
    public function getCliente_nombre() {
        return $this->cliente_nombre;
    }

    public function setCliente_nombre($cliente_nombre) {
        $this->cliente_nombre = $cliente_nombre;
    }
   	public function getCliente_phone() {
        return $this->cliente_phone;
    }

    public function setCliente_phone($cliente_phone) {
        $this->cliente_phone = $cliente_phone;
    }
   	public function getAccion() {
        return $this->accion;
    }

    public function setAccion($accion) {
        $this->accion = $accion;
    }

    public function getBill_to() {
        return $this->bill_to;
    }

    public function setBill_to($bill_to) {
        $this->bill_to = $bill_to;
    }
    public function getShip_to() {
        return $this->ship_to;
    }

    public function setShip_to($ship_to) {
        $this->ship_to = $ship_to;
    }
    public function getCustomer_address() {
        return $this->customer_address;
    }

    public function setCustomer_address($customer_address) {
        $this->customer_address = $customer_address;
    }
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
    public function getAplicacion() {
        return $this->aplicacion;
    }

    public function setAplicacion($aplicacion) {
        $this->aplicacion = $aplicacion;
    }
    public function getEnviroment() {
        return $this->enviroment;
    }

    public function setEnviroment($enviroment) {
        $this->enviroment = $enviroment;
    }
    public function getOperating_conditions() {
        return $this->operating_conditions;
    }

    public function setOperating_conditions($operating_conditions) {
        $this->operating_conditions = $operating_conditions;
    }
    public function getTemperature() {
        return $this->temperature;
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }
    public function getComentarios() {
        return $this->comentarios;
    }

    public function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
     public function save()
    {
    	$query="INSERT INTO formulario_retorno(id_form_retorno, sales_order, PO, ship_method_via, customer_phone, customer_fax, warranty_status, cliente_nombre, cliente_phone, accion, bill_to, ship_to, customer_address, city, aplicacion, enviroment, operating_conditions, temperature, comentarios, estado,fecha)
				values(NULL,
    			'".$this->sales_order."',
    			'".$this->PO."',
    			'".$this->ship_method_via."',
    			'".$this->customer_phone."',
    			'".$this->customer_fax."',
                '".$this->warranty_status."',
                '".$this->cliente_nombre."',
    			'".$this->cliente_phone."',
    			'".$this->accion."',
    			'".$this->bill_to."',
                '".$this->ship_to."',
                '".$this->customer_address."',
                '".$this->city."',
                '".$this->aplicacion."',
                '".$this->enviroment."',
                '".$this->operating_conditions."',
                '".$this->temperature."',
                '".$this->comentarios."',
                '".$this->estado."',
                '".$this->fecha."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
     public function delete()
    {
       $query="DELETE FROM formulario_retorno WHERE id_form_retorno='".$this->id_form_retorno."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
  public function selectALL()
    {
        $query="SELECT * FROM formulario_retorno";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
  public function selectALLONE($codigo)
    {
        $query="SELECT * FROM formulario_retorno WHERE id_form_retorno='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
   public function selectLast()
    {
        $query="SELECT * FROM formulario_retorno ORDER BY id_form_retorno DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
      public function update()
    {
        $query="UPDATE formulario_retorno SET sales_order='".$this->sales_order."',PO='".$this->PO."',ship_method_via='".$this->ship_method_via."',customer_phone='".$this->customer_phone."',customer_fax='".$this->customer_fax."',warranty_status='".$this->warranty_status."',cliente_nombre='".$this->cliente_nombre."',cliente_phone='".$this->cliente_phone."',accion='".$this->accion."',bill_to='".$this->bill_to."',ship_to='".$this->ship_to."',customer_address='".$this->customer_address."',city='".$this->address."',aplicacion='".$this->aplicacion."',enviroment='".$this->enviroment."',operating_conditions='".$this->operating_conditions."',temperature='".$this->temperature."',comentarios='".$this->comentarios."',estado='".$this->estado."',fecha='".$this->fecha."' WHERE id_form_retorno='".$this->id_form_retorno."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }


}//end class
?>