<?php
require_once "../config/conexion.php";
/**
 * 
 */
class TipoMaquina extends Conexion
{
	private $id_tipo_maquina;
	private $nombre;
	private $descripcion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_tipo_maquina = "";
        $this->nombre = "";
        $this->descripcion = "";
	}
 	public function getId_tipo_maquina() {
        return $this->id_tipo_maquina;
    }

    public function setId_tipo_maquina($id) {
        $this->id_tipo_maquina = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    //FUNCIONES-------------------------------------------------

    public function save()
    {
    	$query="INSERT INTO tipo_maquina(id_tipo_ma,nombre,descripcion)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->descripcion."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE tipo_maquina SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_tipo_ma='".$this->id_tipo_maquina."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_maquina WHERE id_tipo_ma='".$this->id_tipo_maquina."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM tipo_maquina";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectDALL($codigo)
    {
        $query="SELECT * FROM tipo_maquina WHERE id_tipo_ma!='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_maquina WHERE id_tipo_ma='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }



    
}//fin clase
?>