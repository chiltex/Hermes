<?php 
require_once "../config/conexion.php";
/**
 * 
 */
class Contactos extends Conexion
{
 private $id_contacto;
 private $nombre;
 private $correo;
 private $telefono;
 private $extension;
 private $movil;
 private $id_cliente;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_contacto = "";
        $this->nombre = "";
        $this->correo = "";
        $this->telefono="";
        $this->extension="";
        $this->movil = "";
        $this->id_cliente = "";
    }

	public function getId_contacto() {
        return $this->id_contacto;
    }

    public function setId_contacto($id) {
        $this->id_contacto = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    	public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    	public function getExtension() {
        return $this->extension;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
    }
    
    public function getMovil() {
        return $this->movil;
    }

    public function setMovil($movil) {
        $this->movil = $movil;
    }
    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    //funciones----
    public function save()
    {
    	$query="INSERT INTO contactos(id_contacto,nombre,correo,telefono,extension,movil,id_cliente)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->correo."',
    			'".$this->telefono."',
    			'".$this->extension."',
    			'".$this->movil."',
    			'".$this->id_cliente."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
     public function update()
    {
        $query="UPDATE contactos SET nombre='".$this->nombre."',correo='".$this->correo."',telefono='".$this->telefono."',extension='".$this->extension."',movil='".$this->movil."',id_cliente='".$this->id_cliente."' WHERE id_contacto='".$this->id_contacto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM contactos WHERE id_contacto='".$this->id_contacto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM contactos";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM contactos WHERE id_contacto='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }
}//End class
?>