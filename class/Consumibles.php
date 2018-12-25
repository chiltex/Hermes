<?php
require_once "../config/conexion.php";
/**
 * 
 */
class Consumibles extends Conexion
{
 private $id_consumible;
 private $nombre;
 private $codigo_serie;
 private $estado;
 private $descripcion;
 private $cantidad;
 private $id_detalle_consumible;
 private $id_ficha_tecnica;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_consumible = "";
        $this->nombre = "";
        $this->codigo_serie = "";
        $this->estado="";
        $this->descripcion="";
        $this->cantidad="";
        $this->id_detalle_consumible="";
        $this->id_ficha_tecnica="";
    }

 public function getId_consumible() {
        return $this->id_consumible;
    }

    public function setId_consumible($id) {
        $this->id_consumible = $id;
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
        return $this->idescripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
   public function getId_ficha_tecnica() {
        return $this->id_ficha_tecnica;
    }

    public function setId_ficha_tecnica($id_ficha_tecnica) {
        $this->id_ficha_tecnica = $id_ficha_tecnica;
    }
   public function getId_detalle_consumible() {
        return $this->id_detalle_consumible;
    }

    public function setId_detalle_consumible($id_detalle_consumible) {
        $this->id_detalle_consumible = $id_detalle_consumible;
    }

    //FUNCIONES________________________

     public function save()
    {
    	$query="INSERT INTO consumibles(id_consumible,nombre,codigo_serie,estado,descripcion)
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
        $query="UPDATE consumibles SET nombre='".$this->nombre."',codigo_serie='".$this->codigo_serie."',descripcion='".$this->descripcion."' WHERE id_consumible='".$this->id_consumible."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM consumibles WHERE id_consumible='".$this->id_consumible."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM consumibles WHERE estado='Activo'";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
       public function selectALL1()
    {
        $query="SELECT * FROM consumibles";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM consumibles WHERE id_consumible='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
     public function changeStatus($codigo,$estado)
    {
       $query="UPDATE consumibles SET estado='".$estado."' WHERE id_consumible='".$codigo."'"; 
       $change=$this->db->query($query);
       if ($change == true) {
        return true;
       }else{
        return false;
       }

    }
    //-------------------------------------------------------------------------------------------------------//
    //-------------------------------------------------------------------------------------------------------//
    //---------------------------------DETALLE DE consumibleS--------------------------------------------------//
    //-------------------------------------------------------------------------------------------------------//
    //-------------------------------------------------------------------------------------------------------//

    public function save1()
    {
        $query="INSERT INTO detalle_consumible(id_detalle_consumible,id_ficha_tecnica,id_consumible,cantidad)
                values(NULL,
                '".$this->id_ficha_tecnica."',
                '".$this->id_consumible."',
                '".$this->cantidad."');";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
         public function selectOneDR($codigo)
    {
        $query="SELECT dr.* , r.nombre , r.codigo_serie FROM detalle_consumible dr INNER JOIN consumibles r on dr.id_consumible = r.id_consumible WHERE dr.id_ficha_tecnica='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
     public function consumibleChecked($codigo,$consumible)
    {
        $query="SELECT dr.* , r.nombre , r.codigo_serie FROM detalle_consumible dr INNER JOIN consumibles r on dr.id_consumible = r.id_consumible WHERE dr.id_ficha_tecnica='".$codigo."' AND r.id_consumible='".$consumible."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows==0) {
            return 1;
        }else{

            return 2;
        }
    }
      public function update1()
    {
       
        $query1="SELECT * FROM detalle_consumible WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."' AND id_consumible='".$this->id_consumible."'";
        $selectall=$this->db->query($query1);
      
            if ($selectall->num_rows==0) {
                # code...
                $query="INSERT INTO detalle_consumible(id_detalle_consumible,id_ficha_tecnica,id_consumible,cantidad)
                values(NULL,
                '".$this->id_ficha_tecnica."',
                '".$this->id_consumible."',
                '".$this->cantidad."');";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    return false;
                } 
            }
            else{
                if ($this->cantidad<=0) {
                   
             $query="DELETE FROM detalle_consumible WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."' AND id_consumible='".$this->id_consumible."'"; 
             $delete=$this->db->query($query);

                }else{
                    $query="UPDATE detalle_consumible SET cantidad='".$this->cantidad."' WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."' AND id_consumible='".$this->id_consumible."'";
                $update=$this->db->query($query);
                if ($update==true) {
                    return true;
                }else {
                    return false;
                }  


                }

                
                    
            }
        

        
          
    }

}//end class

?>