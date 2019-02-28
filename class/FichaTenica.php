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
 private $equipo_queda;
 private $id_cliente;
 private $id_producto;
 private $id_contacto;
 private $firma_cliente;
 private $firma_tecnico;
 private $id_usuario;
 private $falla;
 private $trabajo;
 private $id_tipo_ma;
 private $linea_produccion;
 private $hora_ingreso;
 private $hora_egreso;
 private $datos_generales;
 private $recibe;
 private $fecha_trabajo;
 private $estado;
 private $tipo_maquina;
 private $tipo_trabajo;




 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_ficha_tecnica ="";
        $this->latitud ="";
        $this->longitud ="";
        $this->equipo_queda="";
        $this->id_cliente="";
        $this->id_producto="";
        $this->id_contacto="";
        $this->firma_cliente="";
        $this->firma_tecnico="";        
        $this->id_usuario="";
        $this->falla="";
        $this->trabajo="";
        $this->id_tipo_ma="";
        $this->linea_produccion="";
        $this->hora_ingreso="";
        $this->hora_ingreso="";
        $this->datos_generales="";
        $this->recibe="";
        $this->foto_uno="";
        $this->foto_dos="";
        $this->foto_tres="";
        $this->estado="";
        $this->tipo_maquina="";
        $this->tipo_trabajo="";

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
    public function getId_tipo_ma() {
        return $this->id_tipo_ma;
    }

    public function setId_tipo_ma($id_tipo_ma) {
        $this->id_tipo_ma = $id_tipo_ma;
    }
    public function getLinea_produccion() {
        return $this->linea_produccion;
    }

    public function setLinea_produccion($linea_produccion) {
        $this->linea_produccion = $linea_produccion;
    }
    public function getHora_ingreso() {
        return $this->hora_ingreso;
    }

    public function setHora_ingreso($hora_ingreso) {
        $this->hora_ingreso = $hora_ingreso;
    }
    public function getHora_egreso() {
        return $this->hora_egreso;
    }

    public function setHora_egreso($hora_egreso) {
        $this->hora_egreso = $hora_egreso;
    }
    public function getDatos_generales() {
        return $this->datos_generales;
    }

    public function setDatos_generales($datos_generales) {
        $this->datos_generales = $datos_generales;
    }
    public function getRecibe() {
        return $this->recibe;
    }

    public function setRecibe($recibe) {
        $this->recibe = $recibe;
    }
    public function getFoto_uno() {
        return $this->foto_uno;
    }

    public function setFoto_uno($foto_uno) {
        $this->foto_uno = $foto_uno;
    }
    public function getFoto_dos() {
        return $this->foto_dos;
    }

    public function setFoto_dos($foto_dos) {
        $this->foto_dos = $foto_dos;
    }
    public function getFoto_tres() {
        return $this->foto_tres;
    }

    public function setFoto_tres($foto_tres) {
        $this->foto_tres = $foto_tres;
    }
    public function getFecha_trabajo() {
        return $this->fecha_trabajo;
    }

    public function setFecha_trabajo($fecha_trabajo) {
        $this->fecha_trabajo = $fecha_trabajo;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getTipo_maquina() {
        return $this->tipo_maquina;
    }

    public function setTipo_maquina($tipo_maquina) {
        $this->tipo_maquina = $tipo_maquina;
    }
     public function getTipo_trabajo() {
        return $this->tipo_trabajo;
    }

    public function setTipo_trabajo($tipo_trabajo) {
        $this->tipo_trabajo = $tipo_trabajo;
    }
    //FUNCIONES----------------

    public function save()
    {
    	$query="INSERT INTO ficha_tecnica (id_ficha_tecnica,latitud, longitud, equipo_queda, id_cliente, id_producto, id_contacto, firma_cliente, firma_tecnico, id_usuario, falla, trabajo,id_tipo_ma,linea_produccion,hora_ingreso,hora_egreso,datos_generales,recibe,foto_uno,foto_dos,foto_tres,fecha_trabajo,estado,tipo_maquina,tipo_trabajo)
				values(NULL,
                '".$this->latitud."',
                '".$this->longitud."',
                '".$this->equipo_queda."',
    			'".$this->id_cliente."',
    			'".$this->id_producto."',
    			'".$this->id_contacto."',
                '".$this->firma_cliente."',
                '".$this->firma_tecnico."',
    			'".$this->id_usuario."',
    			'".$this->falla."',
    			'".$this->trabajo."',
                '".$this->id_tipo_ma."',
                '".$this->linea_produccion."',
                '".$this->hora_ingreso."',
                '".$this->hora_egreso."',
                '".$this->datos_generales."',
                '".$this->recibe."',
                '".$this->foto_uno."',
                '".$this->foto_dos."',
                '".$this->foto_tres."',
                CURDATE(),'Iniciado',
                '".$this->tipo_maquina."',
                '".$this->tipo_trabajo."');";
    	$save=$this->db->query($query);
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
        $query="UPDATE ficha_tecnica SET equipo_queda='".$this->equipo_queda."', falla='".$this->falla."', trabajo='".$this->trabajo."', id_tipo_ma='".$this->id_tipo_ma."', linea_produccion='".$this->linea_produccion."', hora_egreso='".$this->hora_egreso."', hora_ingreso='".$this->hora_ingreso."', datos_generales='".$this->datos_generales."', recibe='".$this->recibe."', foto_uno='".$this->foto_uno."', foto_dos='".$this->foto_dos."', foto_tres='".$this->foto_tres."', estado='".$this->estado."', tipo_maquina='".$this->tipo_maquina."', tipo_trabajo='".$this->tipo_trabajo."' WHERE id_ficha_tecnica='".$this->id_ficha_tecnica."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

      public function selectALLU($codigo)
    {
       $query="SELECT ft.id_ficha_tecnica, p.nombre, c.nombre as client, ft.equipo_queda FROM ficha_tecnica ft INNER JOIN productos p on ft.id_producto=p.id_producto INNER JOIN cliente c ON ft.id_cliente=c.id_cliente  WHERE ft.id_usuario = '".$codigo."'";
        $selectall=$this->db->query($query);
        $ListFichas=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListFichas;
    }
     public function selectOne($codigo)
    {
        $query="SELECT ft.*,ft.id_contacto,c.nombre as clie, co.nombre as contac,p.nombre as prod,p.codigo_serie,u.nombre as usuario,u.apellido as usuario_ape, tp.nombre as tipo_maqui FROM ficha_tecnica ft INNER JOIN cliente c ON ft.id_cliente=c.id_cliente INNER JOIN contactos co ON ft.id_contacto=co.id_contacto 
        INNER JOIN tipo_maquina tp ON ft.id_tipo_ma = tp.id_tipo_ma INNER JOIN productos p ON ft.id_producto = p.id_producto INNER JOIN usuario u ON ft.id_usuario = u.id_usuario WHERE ft.id_ficha_tecnica = '".$codigo."'";
        $selectall=$this->db->query($query);
        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListFicha;
    }
      public function selectALL()
    {
        $query="SELECT ft.id_ficha_tecnica, p.nombre, c.nombre as client, ft.equipo_queda,u.nombre as usuario,u.apellido as usuario_ape FROM ficha_tecnica ft INNER JOIN productos p on ft.id_producto=p.id_producto INNER JOIN cliente c ON ft.id_cliente=c.id_cliente INNER JOIN usuario u ON ft.id_usuario = u.id_usuario ";
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
    public function reporteHTS($codigo)
    {
        $query="SELECT ft.* , cli.nombre as clie, con.nombre as contac,tp.nombre as tipo_maqui, u.nombre as usuario,p.nombre as prod,p.codigo_serie FROM ficha_tecnica ft 
        INNER JOIN cliente cli ON ft.id_cliente=cli.id_cliente 
        INNER JOIN contactos con ON ft.id_contacto = con.id_contacto 
        INNER JOIN tipo_maquina tp ON ft.id_tipo_ma = tp.id_tipo_ma
        INNER JOIN productos p ON ft.id_producto = p.id_producto
        INNER JOIN usuario u ON ft.id_usuario = u.id_usuario WHERE ft.id_ficha_tecnica ='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
   
     public function updateColors($fichaT)
    {
        $query1="SELECT * FROM ticket WHERE id_ficha_tecnica='".$fichaT."'";
        $selectall=$this->db->query($query1);
        if ($selectall->num_rows!=0) {
             $ticket=$selectall->fetch_all(MYSQLI_ASSOC);
             foreach ($ticket as $key ) {
                 $id_ticket = $key['id_ticket'];
             }
             $query="UPDATE events SET color='#B7100A' WHERE id_ticket='".$id_ticket."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        } 

            
        }else{

            return false;
        }
      
      
    }

}
?>
