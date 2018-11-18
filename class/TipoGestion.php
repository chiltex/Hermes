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
    private $id_gestion;

	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_tipo_gestion = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->id_gestion = "";
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
    public function getId_gestion() {
        return $this->id_gestion;
    }

    public function setId_gestion($id_gestion) {
        $this->id_gestion = $id_gestion;
    }
    //FUNCIONES-------------------------------------------------

    public function save()
    {
    	$query="INSERT INTO tipo_gestion(id_tipo_gestion,nombre,descripcion,id_gestion)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->descripcion."',
                '".$this->id_gestion."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE tipo_gestion SET nombre='".$this->nombre."',descripcion='".$this->descripcion."',id_gestion='".$this->id_gestion."' WHERE id_tipo_gestion='".$this->id_tipo_gestion."'";
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
        $query="SELECT tg.*, g.nombre as gestions FROM tipo_gestion tg INNER JOin gestion g on g.id_gestion= tg.id_gestion";
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
    public function selectALLTG($codigo)
    {
        $query="SELECT * FROM tipo_gestion WHERE id_gestion='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }


    
}//fin clase
?>