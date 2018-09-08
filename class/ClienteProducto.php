<?php
require_once "../config/conexion.php";
/**
 * 
 */
class ClienteProducto extends Conexion
{
 private $id_cliente_producto;
 private $id_cliente;
 private $id_producto;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_cliente_producto = "";
        $this->id_cliente="";
        $this->id_producto="";
    }


	public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

	public function getId_cliente_producto() {
        return $this->id_cliente_producto;
    }

    public function setId_cliente_producto($id) {
        $this->id_cliente_producto = $id;
    }

	public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto= $id_producto;
    }
    //FUNCIONES--------------------------------------------------------
   public function save()
    {
    	$query1="SELECT * FROM cliente_producto WHERE id_cliente='".$this->id_cliente."' AND id_producto='".$this->id_producto."'";
        $selectall=$this->db->query($query1);
      
       		if ($selectall->num_rows==0) {
       			# code...
       			$query="INSERT INTO cliente_producto(id_cliente_producto,id_cliente,id_producto)
    			values(NULL,
    			".$this->id_cliente.",
    			".$this->id_producto.");";
    			$save=$this->db->query($query);
    			if ($save==true) {
		            return true;
		        }else {
		            
		            return false;
		        } 
       		}
       		else{
       			return false;
		       		
       		}
       	

    	
    	  
    }
    public function delete()
    {
       $query="DELETE FROM cliente_producto WHERE id_cliente_producto='".$this->id_cliente_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL($codigo)
    {
        $query="SELECT P.nombre,P.codigo_serie, CP.id_cliente_producto,CP.id_producto FROM productos P INNER JOIN cliente_producto CP on CP.id_producto = P.id_producto WHERE CP.id_cliente='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListProductos=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListProductos;
    }


}
?>