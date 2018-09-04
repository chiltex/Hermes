<?php
require_once "../config/conexion.php";
/**
 * 
 */
class TipoGestion extends Conexion
{
	private $id_tipo_gestion;
	private $nombre;
	private $descripcion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_tipo_gestion = "";
        $this->nombre = "";
        $this->descripcion = "";
	}
 	public function getId_tipo_gestion() {
        return $this->id_tipo_gestion;
    }

    public function setId_tipo_gestion($id) {
        $this->id_tipo_gestion = $id;
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
    	$query="INSERT INTO tipo_gestion(id_tipo_gestion,nombre,descripcion)
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
        $query="UPDATE tipo_gestion SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_tipo_gestion='".$this->id_tipo_gestion."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_gestion WHERE id_tipo_gestion='".$this->id_tipo_gestion."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM tipo_gestion";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_gestion WHERE id_tipo_gestion='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }



    
}//fin clase
?>