<?php
require_once "../config/conexion.php";
/**
 * 
 */
class Productos extends Conexion
{
 private $id_producto;
 private $nombre;
 private $codigo_serie;
 private $estado;
 private $id_grupo_producto;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_producto = "";
        $this->nombre = "";
        $this->codigo_serie = "";
        $this->estado="";
        $this->id_grupo_producto="";
    }

 public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id) {
        $this->id_producto = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCodigo_serie() {
        return $this->codigo_serie;
    }

    public function setCodigo_Serie($codigo_serie) {
        $this->codigo_serie = $codigo_serie;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getId_grupo_producto() {
        return $this->id_tgrupo_producto;
    }

    public function setId_grupo_producto($id_grupo_producto) {
        $this->id_grupo_producto = $id_grupo_producto;
    }

    //FUNCIONES________________________

     public function save()
    {
    	$query="INSERT INTO productos(id_producto,nombre,codigo_serie,estado,id_grupo_producto)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->codigo_serie."',
    			'Activo','".$this->id_grupo_producto."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE productos SET nombre='".$this->nombre."',codigo_serie='".$this->codigo_serie."',id_grupo_producto='".$this->id_grupo_producto."' WHERE id_producto='".$this->id_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM productos WHERE id_producto='".$this->id_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM productos";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM productos WHERE id_producto='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
     public function changeStatus($codigo,$estado)
    {
       $query="UPDATE producto SET estado='".$estado."' WHERE id_producto='".$codigo."'"; 
       $change=$this->db->query($query);
       if ($change == true) {
        return true;
       }else{
        return false;
       }

    }
       public function selectOneGP($codigo)
    {
        $query="SELECT * FROM grupo_producto WHERE id_grupo_producto='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListGP=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListGP;
	}
	 public function selectOneDGP($codigo)
	    {
	        $query="SELECT * FROM grupo_producto WHERE id_grupo_producto!='".$codigo."'";
	        $selectall=$this->db->query($query);
	        $ListGP=$selectall->fetch_all(MYSQLI_ASSOC);
	      return $ListGP;
	}



}//end class

?>