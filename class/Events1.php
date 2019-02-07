<?php
require_once "../config/conexion.php";

class Events extends Conexion
{
 private $id;
 private $tittle;
 private $color;
 private $star;
 private $end;
 private $descripcion;
 private $id_usuario;
 private $id_ticket;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id = "";
        $this->tittle = "";
        $this->color = "";
        $this->star="00/00/0000";
        $this->end="00/00/0000";
        $this->descripcion="";
        $this->id_usuario="";
        $this->id_ticket="";
    }

	public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getTittle() {
        return $this->tittle;
    }

    public function setTittle($tittle) {
        $this->tittle = $tittle;
    }
    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }
    public function getStar() {
    
       return $this->star;
    }

    public function setStar($star) {
        $this->star = $star;
    }
  	public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }  
  	public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    } 
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    } 
    public function getId_ticket() {
        return $this->id_ticket;
    }

    public function setId_ticket($id_ticket) {
        $this->id_ticket = $id_ticket;
    }
//Funciones-------------------------
 public function save()
    {
    	$query="INSERT INTO events(id,title,color,start,end,descripcion,id_usuario,id_ticket)
    			values(0,'".$this->tittle."',
    			'".$this->color."',
    			'".$this->star."',
    			'".$this->end."',
    			'".$this->descripcion."',
                '".$this->id_usuario."',
                '".$this->id_ticket."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
 public function delete()
    {
       $query="DELETE FROM events WHERE id='".$this->id."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
 public function selectALL()
    {
        $query="SELECT * FROM events";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
 public function selectALLONE($codigo)
    {
        $query="SELECT * FROM events WHERE id='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
  public function update()
    {
        $query="UPDATE events SET title='".$this->tittle."',color='".$this->color."',descripcion='".$this->descripcion."',id_usuario='".$this->id_usuario."' WHERE id='".$this->id."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

     public function selectOperadores($codigo)
    {
        $query="SELECT * FROM usuario WHERE id_tipo_usuario ='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuario;
    }
      public function updateDate1()
    {
        $query="UPDATE events SET start='".$this->star."',end='".$this->end."' WHERE id_ticket='".$this->id_ticket."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
         public function selectLast()
    {
        $query="SELECT * FROM events ORDER BY id DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
    public function selectHour($codigo)
    {
        $query="SELECT TIME(start) as hora FROM events WHERE id_ticket='".$codigo."'";
        $selectall=$this->db->query($query);
          if ($selectall->num_rows!=0) {
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        }else{
            $ListClientes = "00:00:00";
        }
       
    }
    public function selectDate($codigo)
    {
        $query="SELECT DATE(start) as fecha FROM events WHERE id_ticket='".$codigo."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows!=0) {
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        }else{
            $ListClientes = "00/00/0000";
        }
       
        return $ListClientes;
    }




}
?>