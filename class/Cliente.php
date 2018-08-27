<?php
require_once "../config/conexion.php";
/**
 * 
 */
class Cliente extends Conexion
{
 private $id_cliente;
 private $nombre;
 private $direccion;
 private $id_categoria;
 private $id_tip_cli;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_cliente = "";
        $this->nombre = "";
        $this->direccion = "";
        $this->id_categoria="";
        $this->id_tip_cli="";
        	}



	public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id) {
        $this->id_cliente = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }
    public function getId_tip_cli() {
        return $this->id_tip_cli;
    }

    public function setId_tip_cli($id_tip_cli) {
        $this->id_tip_cli = $id_tip_cli;
    }
 //---------------------Funciones----------------------------//
     public function save()
    {
    	$query="INSERT INTO cliente(id_cliente,nombre,direccion,id_categoria,id_tip_cli)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->direccion."',
    			".$this->id_categoria.",
    			".$this->id_tip_cli.");";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
     public function update()
    {
        $query="UPDATE cliente SET nombre='".$this->nombre."',direccion='".$this->direccion."',id_categoria='".$this->id_categoria."',id_tip_cli='".$this->id_tip_cli."' WHERE id_cliente='".$this->id_cliente."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM cliente WHERE id_cliente='".$this->id_cliente."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM cliente";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM cliente WHERE id_cliente='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
      public function selectAllTipCliente()
    {
        $query="SELECT * FROM tipo_cliente";
        $selectall=$this->db->query($query);
        $ListTC=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTC;
    }
     public function selectOneTC($codigo)
    {
        $query="SELECT * FROM tipo_cliente WHERE id_tip_cli='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListCliente;
}
 public function selectOneDTC($codigo)
    {
        $query="SELECT * FROM tipo_cliente WHERE id_tip_cli!='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListCliente;
}
 	 public function selectOneCat($codigo)
    {
        $query="SELECT * FROM categorias WHERE id_categoria='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListCliente;
	}
	 public function selectOneDCat($codigo)
    {
        $query="SELECT * FROM categorias WHERE id_categoria!='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListCliente;
	}

}//end class
?>