<?php
require_once "../config/conexion.php";
/**
 * 
 */
class Repuestos extends Conexion
{
 private $id_repuesto;
 private $nombre;
 private $codigo_serie;
 private $estado;
 private $descripcion;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_repuesto = "";
        $this->nombre = "";
        $this->codigo_serie = "";
        $this->estado="";
        $this->descripcion="";
    }

 public function getId_repuesto() {
        return $this->id_repuesto;
    }

    public function setId_repuesto($id) {
        $this->id_repuesto = $id;
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
    public function getDescripcion() {
        return $this->id_tgrupo_producto;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    //FUNCIONES________________________

     public function save()
    {
    	$query="INSERT INTO repuestos(id_repuesto,nombre,codigo_serie,estado,descripcion)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->codigo_serie."',
    			'Activo','".$this->descripcion."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE repuestos SET nombre='".$this->nombre."',codigo_serie='".$this->codigo_serie."',descripcion='".$this->descripcion."' WHERE id_repuesto='".$this->id_repuesto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM repuestos WHERE id_repuesto='".$this->id_repuesto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM repuestos WHERE estado='Activo'";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
       public function selectALL1()
    {
        $query="SELECT * FROM repuestos";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM repuestos WHERE id_repuesto='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
     public function changeStatus($codigo,$estado)
    {
       $query="UPDATE repuestos SET estado='".$estado."' WHERE id_repuesto='".$codigo."'"; 
       $change=$this->db->query($query);
       if ($change == true) {
        return true;
       }else{
        return false;
       }

    }

}//end class

?>