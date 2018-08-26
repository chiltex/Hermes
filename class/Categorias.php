<?php
require_once "../config/conexion.php";
/**
 * 
 */
class Categorias extends Conexion
{
	private $id_categorias;
	private $nombre;
	private $descripcion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_categorias = "";
        $this->nombre = "";
        $this->descripcion = "";
	}
 	public function getId_categorias() {
        return $this->id_categorias;
    }

    public function setId_categorias($id) {
        $this->id_categorias = $id;
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
    	$query="INSERT INTO categorias(id_categoria,nombre,descripcion)
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
        $query="UPDATE categorias SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_categoria='".$this->id_categorias."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM categorias WHERE id_categoria='".$this->id_categorias."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM categorias";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM categorias WHERE id_categoria='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }



    
}//fin clase
?>