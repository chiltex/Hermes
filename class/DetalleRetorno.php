<?php 
require_once "../config/conexion.php";
/**
 * 
 */
class DetalleRetorno extends Conexion
{

 private $id_form_retorno;
 private $part_number_description;
 private $marsh_authorization_level;
 private $equipment_serial_number;
 private $codigo_serie;
 private $cantidad;
 private $id_part_fail;
 private $invoice;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->cantidad = "";
        $this->id_form_retorno = "";
        $this->part_number_description = "";
        $this->marsh_authorization_level="";
        $this->equipment_serial_number="";
        $this->codigo_serie="";
        $this->cantidad="";
        $this->id_part_fail="";
        $this->invoice="";
    }

 public function getcantidad() {
        return $this->cantidad;
    }

    public function setcantidad($id) {
        $this->cantidad = $id;
    }
    
    public function getId_form_retorno() {
        return $this->id_form_retorno;
    }

    public function setId_form_retorno($id_form_retorno) {
        $this->id_form_retorno = $id_form_retorno;
    }

    public function getpart_number_description() {
        return $this->part_number_description;
    }

    public function setpart_number_description($part_number_description) {
        $this->part_number_description = $part_number_description;
    }

    public function getMarsh_authorization_level() {
        return $this->marsh_authorization_level;
    }

    public function setMarsh_authorization_level($marsh_authorization_level) {
        $this->marsh_authorization_level = $marsh_authorization_level;
    }
    public function getEquipment_serial_number() {
        return $this->equipment_serial_number;
    }

    public function setEquipment_serial_number($equipment_serial_number) {
        $this->equipment_serial_number = $equipment_serial_number;
    }
    public function getCodigo_serie() {
        return $this->codigo_serie;
    }

    public function setCodigo_serie($codigo_serie) {
        $this->codigo_serie = $codigo_serie;
    }

    public function getId_part_fail() {
        return $this->id_part_fail;
    }

    public function setId_part_fail($id_part_fail) {
        $this->id_part_fail = $id_part_fail;
    }
    public function getInvoice() {
        return $this->invoice;
    }

    public function setInvoice($invoice) {
        $this->invoice = $invoice;
    }
//------------------------------------------------------------------------
     public function save()
    {
    	$query="INSERT INTO detalle_retorno(id_detalle_retorno, id_form_retorno, part_number_description, marsh_authorization_level, equipment_serial_number, codigo_serie, cantidad, id_part_fail, invoice)
    			values(NULL,
    			'".$this->id_form_retorno."',
    			'".$this->part_number_description."',
    			'Activo','".$this->marsh_authorization_level."',
    			'Activo','".$this->equipment_serial_number."',
    			'Activo','".$this->codigo_serie."',
    			'Activo','".$this->cantidad."',
    			'Activo','".$this->id_part_fail."',
    			'Activo','".$this->invoice."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE detalle_retorno SET part_number_description='".$this->part_number_description."',marsh_authorization_level='".$this->marsh_authorization_level."',equipment_serial_number='".$this->equipment_serial_number."',codigo_serie='".$this->codigo_serie."',cantidad='".$this->cantidad."',id_part_fail='".$this->id_part_fail."',invoice='".$this->invoice."' WHERE id_detalle_retorno='".$this->id_detalle_retorno."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_retorno WHERE cantidad='".$this->cantidad."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
       public function selectALL1()
    {
        $query="SELECT * FROM detalle_retorno";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_retorno WHERE id_detalle_retorno='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }

}

 ?>