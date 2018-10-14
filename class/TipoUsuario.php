<?php
require_once "../config/conexion.php";
/**
 * 
 */
class TipoUsuario extends Conexion
{
	private $id_tipo_usuario;
	private $nombre;
	private $descripcion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_tipo_usuario = "";
        $this->nombre = "";
        $this->descripcion = "";
	}
 	public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id) {
        $this->id_tipo_usuario = $id;
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
    	$query="INSERT INTO tipo_usuario(id_tipo_usuario,nombre,descripcion)
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
        $query="UPDATE tipo_usuario SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_tipo_usuario='".$this->id_tipo_usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_usuario WHERE id_tipo_usuario='".$this->id_tipo_usuario."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM tipo_usuario";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_usuario WHERE id_tipo_usuario='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }



    
}//fin clase
?>