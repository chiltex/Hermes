<?php
require_once "../config/conexion.php";
/**
 * 
 */
class GrupoProducto extends Conexion
{
	private $id_grupo_producto;
	private $nombre;
	private $descripcion;
    private $estado;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_grupo_producto = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->estado="";
	}
 	public function getId_grupo_producto() {
        return $this->id_grupo_producto;
    }

    public function setId_grupo_producto($id) {
        $this->id_grupo_producto = $id;
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
       public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    //FUNCIONES-------------------------------------------------

    public function save()
    {
    	$query="INSERT INTO grupo_producto(id_grupo_producto,nombre,descripcion,estado)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->descripcion."','Activo');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE grupo_producto SET nombre='".$this->nombre."',descripcion='".$this->descripcion."' WHERE id_grupo_producto='".$this->id_grupo_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM grupo_producto WHERE id_grupo_producto='".$this->id_grupo_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM grupo_producto";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM grupo_producto WHERE id_grupo_producto='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function changeStatus($codigo,$estado)
    {
       $query="UPDATE grupo_producto SET estado='".$estado."' WHERE id_grupo_producto='".$codigo."'"; 
       $change=$this->db->query($query);
       if ($change == true) {
        return true;
       }else{
        return false;
       }

    }



    
}//fin clase
?>