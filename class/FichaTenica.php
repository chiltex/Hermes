<?php
require_once "../config/conexion.php";
/**
 * 
 */
class FichaTecnica extends Conexion
{
 private $id_ficha_tecnica;
 private $latitud;
 private $longitud;
 private $descripcion;
 private $equipo_queda;
 private $id_cliente;
 private $id_producto;
 private $id_contacto;
 private $firma_cliente;
 private $firma_tecnico;
 private $id_usuario;
 private $falla;
 private $trabajo;
 private $detalle_repuestos;


 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_ficha_tecnica ="";
        $this->latitud ="";
        $this->longitud ="";
        $this->descripcion="";
        $this->equipo_queda="";
        $this->id_cliente="";
        $this->id_producto="";
        $this->id_contacto="";
        $this->firma_cliente="";
        $this->firma_tecnico="";        
        $this->id_usuario="";
        $this->falla="";
        $this->trabajo="";
        $this->detalle_repuestos="";
    }

	public function getId_ficha_tecnica() {
        return $this->id_ficha_tecnica;
    }

    public function setId_ficha_tecnica($id) {
        $this->id_ficha_tecnica = $id;
    }
    
    public function getLatitud() {
        return $this->latitud;
    }

    public function setLatitud($atitud) {
        $this->latitud = $atitud;
    }

    public function getLongitud() {
        return $this->longitud;
    }

    public function setLongitud($ongitud) {
        $this->longitud = $ongitud;
    }

	public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function getEquipo_queda() {
        return $this->equipo_queda;
    }

    public function setEquipo_queda($equipo_queda) {
        $this->equipo_queda = $equipo_queda;
    }
    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
    public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto= $id_producto;
    }
    public function getId_contacto() {
        return $this->id_contacto;
    }

    public function setId_contacto($id_contacto) {
        $this->id_contacto = $id_contacto;
    }
   	public function getFirma_cliente() {
        return $this->firma_cliente;
    }

    public function setFirma_cliente($firma_cliente) {
        $this->firma_cliente = $firma_cliente;
    }
   	public function getFirma_tecnico() {
        return $this->firma_tecnico;
    }

    public function setFirma_tecnico($firma_tecnico) {
        $this->firma_tecnico = $firma_tecnico;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    public function getFalla() {
        return $this->falla;
    }

    public function setFalla($falla) {
        $this->falla = $falla;
    }
    public function getTrabajo() {
        return $this->trabajo;
    }

    public function setTrabajo($trabajo) {
        $this->trabajo = $trabajo;
    }
    public function getDetalle_repuestos() {
        return $this->detalle_repuestos;
    }

    public function setDetalle_repuestos($detalle_repuestos) {
        $this->detalle_repuestos = $detalle_repuestos;
    }
    //FUNCIONES----------------

    public function save()
    {
    	$query="INSERT INTO ficha_tecnica (id_ficha_tecnica, descripcion, equipo_queda, id_cliente, id_producto, id_contacto, firma_cliente, firma_tecnico, id_usuario, falla, trabajo,detalle_repuestos)
				values(NULL,
    			'".$this->descripcion."',
    			'".$this->equipo_queda."',
    			'".$this->id_cliente."',
    			'".$this->id_producto."',
    			'".$this->id_contacto."',
                '".$this->firma_cliente."',
                '".$this->firma_tecnico."',
    			'".$this->id_usuario."',
    			'".$this->falla."',
    			'".$this->trabajo."',
                '".$this->detalle_repuestos."');";
    	$save=$this->db->query($query) or die(mysqli_error($this->db->query($query)));
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
     public function delete()
    {
       $query="DELETE FROM ficha_tecnica WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function update()
    {
        $query="UPDATE ficha_tecnica SET descripcion='".$this->descripcion."',equipo_queda='".$this->equipo_queda."', falla='".$this->falla."', trabajo='".$this->trabajo."', detalle_repuestos='".$this->detalle_repuestos."' WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

      public function selectALLU($codigo)
    {
        $query="SELECT * FROM ficha_tecnica WHERE id_usuario='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListFichas=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListFichas;
    }
     public function selectOne($codigo)
    {
        $query="SELECT ft.*,c.nombre as clie, co.nombre as contac,p.nombre as prod,p.codigo_serie,u.nombre as usuario FROM ficha_tecnica ft INNER JOIN cliente c ON ft.id_cliente=c.id_cliente INNER JOIN contactos co ON ft.id_contacto=co.id_contacto INNER JOIN productos p ON ft.id_producto = p.id_producto INNER JOIN usuario u ON ft.id_usuario = u.id_usuario WHERE ft.id_ficha_tecnica = '".$codigo."'";
        $selectall=$this->db->query($query);
        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListFicha;
    }
      public function selectALL()
    {
        $query="SELECT ft.id_ficha_tecnica, p.nombre, c.nombre as client, ft.equipo_queda FROM ficha_tecnica ft INNER JOIN productos p on ft.id_producto=p.id_producto INNER JOIN cliente c ON ft.id_cliente=c.id_cliente ";
        $selectall=$this->db->query($query);
        $ListFichas=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListFichas;
    }
        public function selectOneC($codigo)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
			   public function selectOneCC($codigo,$contacto)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."' AND id_contacto='".$contacto."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
			   public function selectOneDC($codigo,$contacto)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."' AND id_contacto!='".$contacto."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
  public function selectPr($codigo,$cliente)
		    {
		         $query="SELECT P.nombre,P.codigo_serie, CP.id_cliente_producto,CP.id_producto FROM productos P INNER JOIN cliente_producto CP on CP.id_producto = P.id_producto WHERE CP.id_producto='".$codigo."' AND CP.id_cliente='".$cliente."'";
		        $selectall=$this->db->query($query);
		        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListFicha;
		    }
		     public function selectLast()
    {
        $query="SELECT * FROM ficha_tecnica ORDER BY id_ficha_tecnica DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
   

}
?>
