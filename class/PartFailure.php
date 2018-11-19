<?php
require_once "../config/conexion.php";
/**
 * 
 */
class PartFailure extends Conexion
{
	private $id_part_fail;
	private $nombre;
	private $descripcion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_part_fail = "";
        $this->nombre = "";
        $this->descripcion = "";
	}
 	public function getid_part_fail() {
        return $this->id_part_fail;
    }

    public function setid_part_fail($id) {
        $this->id_part_fail = $id;
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
    	$query="INSERT INTO part_failure(id_part_fail,nombre,descripcion)
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
        $query="UPDATE part_failure SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_part_fail='".$this->id_part_fail."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM part_failure WHERE id_part_fail='".$this->id_part_fail."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM part_failure Order by id_part_fail";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM part_failure WHERE id_part_fail='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }

        public function selectCount()
    {
        $query="SELECT coount(id_part_fail) as total FROM part_failure";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
    public function selectNexts($codigo)
    {
        $query="SELECT * FROM part_failure WHERE id_part_fail > '".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function select10First()
    {
        $query="SELECT * FROM part_failure LIMIT 0, 8";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }public function select10Next()
    {
        $query="SELECT * FROM part_failure LIMIT 8, 8";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
}//fin clase
?>